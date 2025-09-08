<?php
$dir = __DIR__ . "/uploads";

// cancella tutti i file dentro uploads
foreach (glob("$dir/*") as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}
?>
