<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
    $fileTmp = $_FILES["image"]["tmp_name"];
    $fileName = $_FILES["image"]["name"];
    $fileType = mime_content_type($fileTmp);

    $supported = ["image/jpeg", "image/png", "image/gif", "image/webp"];
    if (!in_array($fileType, $supported)) {
        die("Formato non supportato. Formati accettati: JPG, PNG, GIF, WebP");
    }

    switch ($fileType) {
        case "image/jpeg":
            $src = imagecreatefromjpeg($fileTmp);
            break;
        case "image/png":
            $src = imagecreatefrompng($fileTmp);
            break;
        case "image/gif":
            $src = imagecreatefromgif($fileTmp);
            break;
        case "image/webp":
            $src = imagecreatefromwebp($fileTmp);
            break;
    }

    $orig_w = imagesx($src);
    $orig_h = imagesy($src);

    $new_w = isset($_POST["width"]) && $_POST["width"] > 0 ? (int)$_POST["width"] : $orig_w;
    $new_h = isset($_POST["height"]) && $_POST["height"] > 0 ? (int)$_POST["height"] : $orig_h;

    $dest = imagecreatetruecolor($new_w, $new_h);

    if (in_array($fileType, ["image/png", "image/gif", "image/webp"])) {
        imagealphablending($dest, false);
        imagesavealpha($dest, true);
        $transparent = imagecolorallocatealpha($dest, 0, 0, 0, 127);
        imagefilledrectangle($dest, 0, 0, $new_w, $new_h, $transparent);
    }

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $new_w, $new_h, $orig_w, $orig_h);

    header("Content-Disposition: attachment; filename=" . basename($fileName));

    switch ($fileType) {
        case "image/jpeg":
            header("Content-Type: image/jpeg");
            imagejpeg($dest, null, 90);
            break;
        case "image/png":
            header("Content-Type: image/png");
            imagepng($dest);
            break;
        case "image/gif":
            header("Content-Type: image/gif");
            imagegif($dest);
            break;
        case "image/webp":
            header("Content-Type: image/webp");
            imagewebp($dest, null, 90);
            break;
    }

    imagedestroy($src);
    imagedestroy($dest);
    exit;
}
