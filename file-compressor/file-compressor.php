<?php
try {
    if (!isset($_FILES['file'])) {
        throw new RuntimeException('No file uploaded');
    }

    function sanitizeFileName($filename)
    {
        $filename = preg_replace("/[^A-Za-z0-9_\-\.]/", "_", $filename);
        return $filename;
    }

    $file = $_FILES['file'];
    $type = $_POST['type'] ?? 'file';
    $quality = $_POST['quality'] ?? 'medium';

    switch ($file['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown upload error.');
    }

    $maxSize = 100 * 1024 * 1024;
    if ($file['size'] > $maxSize) {
        throw new RuntimeException('File too large. Max 100MB allowed.');
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = [
        'image' => ['extensions' => ['jpg', 'jpeg', 'png', 'webp'], 'mimes' => ['image/jpeg', 'image/png', 'image/webp']],
        'pdf' => ['extensions' => ['pdf'], 'mimes' => ['application/pdf']],
        'video' => ['extensions' => ['mp4', 'avi', 'mov'], 'mimes' => ['video/mp4', 'video/x-msvideo', 'video/quicktime']],
        'audio' => ['extensions' => ['mp3', 'wav', 'aac'], 'mimes' => ['audio/mpeg', 'audio/wav', 'audio/aac']],
    ];

    if (!isset($allowed[$type])) {
        throw new RuntimeException('Invalid type selected.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $allowed[$type]['mimes'], true)) {
        throw new RuntimeException('Invalid file type.');
    }
    if (!in_array($ext, $allowed[$type]['extensions'], true)) {
        throw new RuntimeException('Invalid file extension.');
    }

    if (!is_uploaded_file($file['tmp_name'])) {
        throw new RuntimeException('Possible file upload attack.');
    }

    $destDir = __DIR__ . '/uploads/';
    if (!is_dir($destDir))
        mkdir($destDir, 0755, true);

    $safeName = sha1_file($file['tmp_name']) . '.' . $ext;
    $destination = $destDir . $safeName;

    switch ($type) {
        case 'image':
            $qualityMap = ['high' => 50, 'medium' => 70, 'low' => 85];

            $inputPath = $destDir . basename($file['name']);
            if (!move_uploaded_file($file['tmp_name'], $inputPath)) {
                throw new RuntimeException('Failed to save uploaded image.');
            }

            $originalName = sanitizeFileName(basename($file['name']));
            $destination = $destDir . "img_compressed_" . $originalName;

            $imagick = new Imagick($inputPath);
            $imagick->setImageCompressionQuality($qualityMap[$quality] ?? 70);
            $imagick->stripImage();
            $imagick->writeImage($destination);
            $imagick->destroy();

            if (filesize($destination) > filesize($inputPath)) {
                copy($inputPath, $destination);
            }

            break;

        case 'pdf':
            $qualityMap = [
                'high' => '/screen',
                'medium' => '/ebook',
                'low' => '/prepress'
            ];

            $inputPath = $destDir . basename($file['name']);
            if (!move_uploaded_file($file['tmp_name'], $inputPath)) {
                throw new RuntimeException('Failed to save uploaded PDF.');
            }

            $originalName = sanitizeFileName(basename($file['name']));
            $destination = $destDir . "pdf_compressed_" . $originalName;

            $gsPath = "C:/Program Files/gs/gs10.02.1/bin/gswin64c.exe"; // cambia se serve
            $cmd = "\"$gsPath\" -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS={$qualityMap[$quality]} -dNOPAUSE -dQUIET -dBATCH -sOutputFile=" . escapeshellarg($destination) . " " . escapeshellarg($inputPath);

            exec($cmd . " 2>&1", $output, $result);
            if ($result !== 0) {
                echo "<pre>";
                print_r($output);
                echo "</pre>";
                throw new RuntimeException('PDF compression failed.');
            }

            if (filesize($destination) > filesize($inputPath)) {
                copy($inputPath, $destination);
            }

            break;

        case 'video':
            $qualityMap = [
                'high' => '32',
                'medium' => '28',
                'low' => '23'
            ];

            $inputPath = $destDir . basename($file['name']);
            if (!move_uploaded_file($file['tmp_name'], $inputPath)) {
                throw new RuntimeException('Failed to save uploaded video.');
            }

            $originalName = sanitizeFileName(basename($file['name']));
            $destination = $destDir . "video_compressed_" . $originalName;

            $ffmpegPath = "ffmpeg";
            $cmd = "\"$ffmpegPath\" -i " . escapeshellarg($inputPath) .
                " -vcodec libx264 -crf {$qualityMap[$quality]} " . escapeshellarg($destination) . " -y";

            exec($cmd . " 2>&1", $output, $result);
            if ($result !== 0) {
                echo "<pre>";
                print_r($output);
                echo "</pre>";
                throw new RuntimeException('Video compression failed.');
            }

            if (filesize($destination) > filesize($inputPath)) {
                copy($inputPath, $destination);
            }
            break;

        case 'audio':
            $qualityMap = [
                'high' => '64k',
                'medium' => '128k',
                'low' => '192k'
            ];

            $inputPath = $destDir . sanitizeFileName(basename($file['name']));
            if (!move_uploaded_file($file['tmp_name'], $inputPath)) {
                throw new RuntimeException('Failed to save uploaded audio.');
            }

            $originalName = sanitizeFileName(basename($file['name']));
            $destination = $destDir . "audio_compressed_" . $originalName;

            $ffmpegPath = "ffmpeg";
            $cmd = "\"$ffmpegPath\" -i " . escapeshellarg($inputPath) .
                " -b:a {$qualityMap[$quality]} " . escapeshellarg($destination) . " -y";

            exec($cmd . " 2>&1", $output, $result);
            if ($result !== 0) {
                echo "<pre>";
                print_r($output);
                echo "</pre>";
                throw new RuntimeException('Audio compression failed.');
            }

            if (filesize($destination) > filesize($inputPath)) {
                copy($inputPath, $destination);
            }
            break;
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($destination) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($destination));
    readfile($destination);
    unlink($destination);
    exit;

} catch (RuntimeException $e) {
    echo "<p style='color:red'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
