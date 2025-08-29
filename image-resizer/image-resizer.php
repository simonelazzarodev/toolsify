<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];

    // Estensione e MIME check
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file);
    finfo_close($finfo);

    $allowed_mime = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($ext, $allowed_ext) || !in_array($mime, $allowed_mime)) {
        die("Invalid file format. Only JPG, PNG and WebP allowed.");
    }

    list($orig_w, $orig_h, $type) = getimagesize($file);

    switch ($type) {
        case IMAGETYPE_JPEG: $src = imagecreatefromjpeg($file); break;
        case IMAGETYPE_PNG:  $src = imagecreatefrompng($file); break;
        case IMAGETYPE_WEBP: $src = imagecreatefromwebp($file); break;
        default: die("Unsupported format");
    }

    $mode = $_POST['mode'] ?? '';
    $new_w = $orig_w;
    $new_h = $orig_h;

    switch ($mode) {
        case 'width':
            $new_w = intval($_POST['width']);
            $new_h = intval(($new_w / $orig_w) * $orig_h);
            break;
        case 'height':
            $new_h = intval($_POST['height']);
            $new_w = intval(($new_h / $orig_h) * $orig_w);
            break;
        case 'percent':
            $percent = intval($_POST['percent']);
            $new_w = intval(($orig_w * $percent) / 100);
            $new_h = intval(($orig_h * $percent) / 100);
            break;
        case 'custom':
            $new_w = intval($_POST['custom_width']);
            $new_h = intval($_POST['custom_height']);
            break;
    }

    $dst = imagecreatetruecolor($new_w, $new_h);
    imagecopyresampled($dst, $src, 0,0,0,0, $new_w,$new_h, $orig_w,$orig_h);

    header("Content-Disposition: attachment; filename=resized.$ext");
    switch ($ext) {
        case 'jpg': case 'jpeg':
            header("Content-Type: image/jpeg");
            imagejpeg($dst, null, 90);
            break;
        case 'png':
            header("Content-Type: image/png");
            imagepng($dst);
            break;
        case 'webp':
            header("Content-Type: image/webp");
            imagewebp($dst, null, 90);
            break;
    }

    imagedestroy($src);
    imagedestroy($dst);
    exit;
}