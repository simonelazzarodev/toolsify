<?php
// Minimal PDF → DOCX/XLSX/IMG converter (Poppler + PhpOffice) — cleaned & refactored

// Ensure Poppler is available to Apache/PHP (no system PATH required)
$popplerBin = 'C:\poppler\bin';
if (is_dir($popplerBin)) {
    $envPath = getenv('PATH') ?: '';
    $newPath = $popplerBin . ';' . $envPath;
    putenv('PATH=' . $newPath);
    $_ENV['PATH'] = $newPath;
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/* ---------- utils ---------- */

function q(string $s): string
{
    return '"' . str_replace('"', '\"', $s) . '"';
}

function pjoin(string ...$parts): string
{
    $p = preg_replace('#[\\/]+#', DIRECTORY_SEPARATOR, join(DIRECTORY_SEPARATOR, $parts));
    // Collapse duplicate separators and normalize trailing slash behavior for dirs
    return $p;
}

function ensure_dir(string $dir): void
{
    if (!is_dir($dir)) @mkdir($dir, 0777, true);
}

function exec_cmd(string $cmd): array
{
    $desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
    $proc = proc_open($cmd, $desc, $pipes, null, $_ENV);
    if (!is_resource($proc)) return ['code' => -1, 'out' => '', 'err' => 'proc_open failed'];
    fclose($pipes[0]);
    $out = stream_get_contents($pipes[1]);
    fclose($pipes[1]);
    $err = stream_get_contents($pipes[2]);
    fclose($pipes[2]);
    $code = proc_close($proc);
    return ['code' => $code, 'out' => $out, 'err' => $err];
}

function cleanup_output_dir(string $dir): void
{
    if (!is_dir($dir)) return;
    foreach (scandir($dir) ?: [] as $it) {
        if ($it === '.' || $it === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $it;
        if (is_dir($path)) {
            $rii = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach ($rii as $f) $f->isDir() ? @rmdir($f->getPathname()) : @unlink($f->getPathname());
            @rmdir($path);
        } else {
            @unlink($path);
        }
    }
}

function downloadFile(string $file): void
{
    if (!is_file($file)) exit('File non trovato.');
    $mime = mime_content_type($file) ?: 'application/octet-stream';
    header('Content-Description: File Transfer');
    header('Content-Type: ' . $mime);
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    readfile($file);
    exit;
}

/* ---------- Poppler helpers ---------- */

function get_page_count(string $pdf): int
{
    $res = exec_cmd('pdfinfo ' . q($pdf));
    if ($res['code'] !== 0) return 1;
    return preg_match('/^Pages:\s+(\d+)/mi', $res['out'], $m) ? max(1, (int)$m[1]) : 1;
}

function read_text_page(string $pdf, int $page, string $txtOut): bool
{
    // one-page extract, UTF-8, layout preserved
    $cmd = 'pdftotext -layout -enc UTF-8 -f ' . (int)$page . ' -l ' . (int)$page . ' ' . q($pdf) . ' ' . q($txtOut);
    $res = exec_cmd($cmd);
    return $res['code'] === 0 && is_file($txtOut);
}

/* ---------- text sanitization for Word ---------- */

function sanitizeForWord(string $text): string
{
    // Replace problematic Unicode; normalize spaces/newlines
    $map = [
        "\u{2013}" => "-",  // en dash
        "\u{2014}" => "-",  // em dash
        "\u{2015}" => "-",  // horizontal bar
        "\u{2022}" => "*",  // bullet
        "\u{00A0}" => " ",  // no-break space
        "\u{200B}" => "",   // zero-width space
        "\u{200E}" => "",   // LRM
        "\u{200F}" => "",   // RLM
    ];
    $text = strtr($text, $map);
    // Normalize line breaks
    $text = preg_replace('/\R/u', "\n", $text);
    // Collapse excessive spaces on lines that are only spacing
    $text = preg_replace('/^[ \t]+$/m', '', $text);
    return $text;
}

/* ---------- paths ---------- */

$uploadDir = pjoin(__DIR__, '..', 'uploads', 'pdf') . DIRECTORY_SEPARATOR;
$outputDir = pjoin(__DIR__, '..', 'uploads', 'output') . DIRECTORY_SEPARATOR;
ensure_dir($uploadDir);
ensure_dir($outputDir);

/* ---------- upload ---------- */

if (!isset($_FILES['pdf']) || $_FILES['pdf']['error'] !== UPLOAD_ERR_OK) exit('Errore durante l\'upload del file.');
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime  = $finfo->file($_FILES['pdf']['tmp_name']);
if ($mime !== 'application/pdf') exit('Il file caricato non è un PDF valido.');

$filename = time() . '-' . basename($_FILES['pdf']['name']);
$filepath = realpath($uploadDir) . DIRECTORY_SEPARATOR . $filename;
if (!move_uploaded_file($_FILES['pdf']['tmp_name'], $filepath)) exit('Impossibile salvare il file sul server.');
$filepath = realpath($filepath);

/* ---------- conversion dispatch ---------- */

$convert = $_POST['convert'] ?? null;
if (!$convert) exit('Nessun tipo di conversione selezionato.');

// Clear previous outputs per conversion
cleanup_output_dir($outputDir);

/* ---------- conversions ---------- */

function convertToWord(string $filepath, string $outputDir): void
{
    $pages = get_page_count($filepath);
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    for ($p = 1; $p <= $pages; $p++) {
        $txtPage = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . "-p{$p}.txt";
        if (!read_text_page($filepath, $p, $txtPage)) continue;

        $raw = file_get_contents($txtPage) ?: '';
        $text = sanitizeForWord($raw);

        if ($p > 1) $section->addPageBreak();

        foreach (preg_split('/\n/', $text) as $line) {
            $line = trim($line);
            if ($line === '') {
                $section->addTextBreak();
            } else {
                // htmlspecialchars to avoid XML issues
                $section->addText(htmlspecialchars($line, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
            }
        }
    }

    $docx = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . ".docx";
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "Word2007");
    $writer->save($docx);
    downloadFile($docx);
}

function convertToExcel(string $filepath, string $outputDir): void
{
    $pages = get_page_count($filepath);
    $spreadsheet = new Spreadsheet();

    for ($p = 1; $p <= $pages; $p++) {
        $txtPage = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . "-p{$p}.txt";
        if (!read_text_page($filepath, $p, $txtPage)) continue;

        $text  = sanitizeForWord(file_get_contents($txtPage) ?: '');
        $lines = preg_split('/\n/', $text);

        $sheet = ($p === 1) ? $spreadsheet->getActiveSheet() : $spreadsheet->createSheet();
        $sheet->setTitle('Page ' . $p);

        $row = 1;
        foreach ($lines as $line) {
            $sheet->setCellValue("A{$row}", $line);
            $row++;
        }
    }

    $xlsx = $outputDir . pathinfo($filepath, PATHINFO_FILENAME) . ".xlsx";
    $writer = new Xlsx($spreadsheet);
    $writer->save($xlsx);
    downloadFile($xlsx);
}

function convertToImage(string $filepath, string $outputDir, string $format): void
{
    $fmt = strtolower($format) === 'jpg' ? 'jpeg' : 'png'; // formato CLI
    $pages = get_page_count($filepath);

    // Normalizza basename
    $baseName = preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($filepath, PATHINFO_FILENAME));
    $tmpBase  = $outputDir . $baseName;
    $imgExt   = strtolower($format) === 'jpg' ? 'jpg' : 'png'; // estensione file

    // 1) Genera immagini multipagina (usa -jpeg / -png)
    $cmd = 'pdftocairo -' . $fmt . ' -r 150 ' . q($filepath) . ' ' . q($tmpBase);
    $res = exec_cmd($cmd);
    if ($res['code'] !== 0) {
        exit("Errore nella conversione delle pagine in immagini.\nCMD: $cmd\nERR: " . $res['err']);
    }

    // 2) Crea cartella interna
    $folder = $outputDir . $baseName;
    if (!is_dir($folder)) mkdir($folder, 0777, true);

    // 3) Sposta le immagini
    for ($p = 1; $p <= $pages; $p++) {
        $src = $tmpBase . '-' . $p . '.' . $imgExt;
        if (is_file($src)) {
            rename($src, $folder . DIRECTORY_SEPARATOR . $baseName . '-' . $p . '.' . $imgExt);
        }
    }

    // 4) ZIP
    $zipPath = $outputDir . $baseName . '.zip';
    $zip = new ZipArchive();
    if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        exit('Impossibile creare lo zip delle immagini.');
    }
    foreach (scandir($folder) as $file) {
        if ($file === '.' || $file === '..') continue;
        $zip->addFile($folder . DIRECTORY_SEPARATOR . $file, $baseName . '/' . $file);
    }
    $zip->close();

    // 5) CLEAN = YES
    foreach (scandir($folder) as $file) {
        if ($file === '.' || $file === '..') continue;
        @unlink($folder . DIRECTORY_SEPARATOR . $file);
    }
    @rmdir($folder);

    // 6) Download ZIP
    downloadFile($zipPath);
}


/* ---------- run ---------- */

switch ($convert) {
    case 'word':
        convertToWord($filepath, $outputDir);
        break;
    case 'excel':
        convertToExcel($filepath, $outputDir);
        break;
    case 'jpg':
    case 'png':
        convertToImage($filepath, $outputDir, $convert);
        break;
    default:
        exit('Tipo di conversione non supportato');
}
