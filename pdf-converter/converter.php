<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

use Spatie\PdfToText\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$uploadDir = __DIR__ . '/../uploads/pdf/';
$outputDir = __DIR__ . '/../uploads/output/';

if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
if (!is_dir($outputDir)) mkdir($outputDir, 0777, true);

if (!isset($_FILES['pdf']) || $_FILES['pdf']['error'] !== UPLOAD_ERR_OK) {
    die("Upload error");
}

$filename = time() . '-' . basename($_FILES['pdf']['name']);
$filepath = $uploadDir . $filename;

move_uploaded_file($_FILES['pdf']['tmp_name'], $filepath);

$convert = $_POST['convert'] ?? null;
if (!$convert) {
    die("Conversion type missing");
}

switch ($convert) {
    case "word":
        convertToWord($filepath, $outputDir);
        break;

    case "excel":
        convertToExcel($filepath, $outputDir);
        break;

    case "jpg":
    case "png":
        convertToImage($filepath, $outputDir, $convert);
        break;

    default:
        die("Unsupported conversion");
}

function convertToWord($filepath, $outputDir) {
    $text = Pdf::getText($filepath);
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText($text);

    $outputFile = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . ".docx";
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "Word2007");
    $writer->save($outputFile);

    downloadFile($outputFile);
}

function convertToExcel($filepath, $outputDir) {
    $text = Pdf::getText($filepath);
    $lines = explode("\n", $text);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $row = 1;
    foreach ($lines as $line) {
        $sheet->setCellValue("A$row", $line);
        $row++;
    }

    $outputFile = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . ".xlsx";
    $writer = new Xlsx($spreadsheet);
    $writer->save($outputFile);

    downloadFile($outputFile);
}

function convertToImage($filepath, $outputDir, $format) {
    $imagick = new \Imagick();
    $imagick->setResolution(150, 150);
    $imagick->readImage($filepath);

    $imagick->setImageFormat($format);

    $outputFile = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . "." . $format;
    $imagick->writeImage($outputFile);

    $imagick->clear();
    $imagick->destroy();

    downloadFile($outputFile);
}

function downloadFile($file) {
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . basename($file));
    header("Content-Length: " . filesize($file));
    readfile($file);
    exit;
}
