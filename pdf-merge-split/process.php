<?php
require __DIR__ . '/../config.php';

// Pulizia automatica dei file più vecchi di 1 ora
$folders = [__DIR__ . '/../uploads/', __DIR__ . '/../downloads/'];
foreach ($folders as $dir) {
    foreach (glob($dir . '*') as $file) {
        if (is_file($file) && time() - filemtime($file) > 3600) {
            unlink($file);
        }
    }
}

// Carica librerie (assicurati di aver fatto `composer require setasign/fpdi`)
require_once __DIR__ . '/../vendor/autoload.php';

use setasign\Fpdi\Fpdi;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $uploadDir = __DIR__ . '/../uploads/';
    $outputDir = __DIR__ . '/../downloads/';

    if (!is_dir($uploadDir))
        mkdir($uploadDir, 0777, true);
    if (!is_dir($outputDir))
        mkdir($outputDir, 0777, true);

    $uploadedFiles = [];

    // Salva i file caricati
    foreach ($_FILES['pdfs']['tmp_name'] as $index => $tmpName) {
        if ($_FILES['pdfs']['error'][$index] === UPLOAD_ERR_OK) {
            $filename = uniqid() . "-" . basename($_FILES['pdfs']['name'][$index]);
            $destination = $uploadDir . $filename;
            move_uploaded_file($tmpName, $destination);
            $uploadedFiles[] = $destination;
        }
    }

    if (empty($uploadedFiles)) {
        die("No files uploaded.");
    }

    // === MERGE ===
    if ($action === 'merge') {
        $pdf = new Fpdi();

        foreach ($uploadedFiles as $file) {
            $pageCount = $pdf->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tplId = $pdf->importPage($pageNo);
                $size = $pdf->getTemplateSize($tplId);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($tplId);
            }
        }

        $outputFile = $outputDir . "merged_" . time() . ".pdf";
        $pdf->Output($outputFile, 'F');

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="merged.pdf"');
        readfile($outputFile);
        exit;
    }

    // === SPLIT ===
    elseif ($action === 'split') {
        $file = $uploadedFiles[0]; // prendo solo il primo file
        $pageCount = (new Fpdi())->setSourceFile($file); // calcolo numero pagine

        $zip = new ZipArchive();
        $zipFile = $outputDir . "split_" . time() . ".zip";

        if ($zip->open($zipFile, ZipArchive::CREATE) === TRUE) {
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $singlePdf = new Fpdi();
                $singlePdf->setSourceFile($file); // ✅ fondamentale
                $tplId = $singlePdf->importPage($pageNo);
                $size = $singlePdf->getTemplateSize($tplId);
                $singlePdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $singlePdf->useTemplate($tplId);

                $tempFile = $outputDir . "page_" . $pageNo . ".pdf";
                $singlePdf->Output($tempFile, 'F');

                $zip->addFile($tempFile, "page_" . $pageNo . ".pdf");
            }
            $zip->close();
        }

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="split_pages.zip"');
        readfile($zipFile);
        exit;
    } else {
    die("Invalid action.");
}
}
