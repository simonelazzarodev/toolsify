<?php
require __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelMedium;

$content = $_POST['content'] ?? '';
$format  = $_POST['format'] ?? 'svg';
$size    = intval($_POST['size'] ?? 500);
$margin  = intval($_POST['margin'] ?? 4);

if (trim($content) === '') {
    die("No content provided");
}

$qr = QrCode::create($content)
    ->setSize($size)
    ->setMargin($margin)
    ->setErrorCorrectionLevel(new ErrorCorrectionLevelMedium());

if ($format === 'png') {
    $writer = new PngWriter();
    $result = $writer->write($qr);
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="qr-code.png"');
    echo $result->getString();
} else {
    $writer = new SvgWriter();
    $result = $writer->write($qr);
    header('Content-Type: image/svg+xml');
    header('Content-Disposition: attachment; filename="qr-code.svg"');
    echo $result->getString();
}
