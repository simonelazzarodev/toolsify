<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

function sanitize_string(string $value): string
{
    $v = trim($value);
    $v = str_replace(["\r", "\n"], ' ', $v);
    return $v;
}

$name = isset($_POST['name']) ? sanitize_string($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize_string($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize_string($_POST['phone']) : '';
$message = isset($_POST['message']) ? trim((string) $_POST['message']) : '';
$privacy = isset($_POST['privacy']) ? $_POST['privacy'] : null;

$errors = [];

$nameRegex = "/^(?!.*\\d)[A-Za-zÀ-ÖØ-öø-ÿ .,'’-]{2,}$/u";
if ($name === '') {
    $errors['name'] = 'Il nome è obbligatorio.';
} elseif (!preg_match($nameRegex, $name)) {
    $errors['name'] = 'Il nome non può contenere numeri e deve avere almeno 2 caratteri.';
}

$emailPattern = "/^[^\\s@]+@[^\\s@]+\\.[^\\s@]{2,}$/";
if ($email === '') {
    $errors['email'] = 'L’email è obbligatoria.';
} elseif (!preg_match($emailPattern, $email)) {
    $errors['email'] = 'Inserisci una email valida nel formato xxx@xxx.xx';
}

if ($phone !== '') {
    if (mb_strlen($phone) > 25) {
        $errors['phone'] = 'Il numero di telefono è troppo lungo.';
    } elseif (!preg_match('/^[0-9 +()\-]{5,25}$/', $phone)) {
        $errors['phone'] = 'Inserisci un numero di telefono valido.';
    }
}

if ($message === '') {
    $errors['message'] = 'Il messaggio è obbligatorio.';
} elseif (mb_strlen($message) < 10) {
    $errors['message'] = 'Il messaggio deve contenere almeno 10 caratteri.';
}

if ($privacy === null) {
    $errors['privacy'] = 'Devi accettare la Privacy Policy.';
}

if (!empty($errors)) {
    http_response_code(422);
    ?>
    <!doctype html>
    <html lang="it">

    <head>
        <meta charset="utf-8">
        <title>Errore di validazione</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                line-height: 1.5;
                padding: 24px;
                color: #111
            }

            .card {
                max-width: 720px;
                margin: auto;
                border: 1px solid #eee;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .04)
            }

            h1 {
                font-size: 20px;
                margin: 0 0 12px
            }

            ul {
                margin: 12px 0 0 18px
            }

            a.btn {
                display: inline-block;
                margin-top: 16px;
                padding: 10px 14px;
                border-radius: 10px;
                border: 1px solid #ddd;
                text-decoration: none
            }
        </style>
    </head>

    <body>
        <div class="card">
            <h1>Correggi i seguenti errori:</h1>
            <ul>
                <?php foreach ($errors as $field => $msg): ?>
                    <li><strong><?php echo htmlspecialchars($field, ENT_QUOTES, 'UTF-8'); ?>:</strong>
                        <?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
            <a class="btn" href="javascript:history.back()">Torna al form</a>
        </div>
    </body>

    </html>
    <?php
    exit;
}

$to = 'support@toolsify.com';
$subject = 'Nuovo contatto dal sito';

$lines = [
    "Hai ricevuto un nuovo messaggio dal form contatti:",
    "",
    "Nome / Azienda: {$name}",
    "Email: {$email}",
    "Telefono: " . ($phone !== '' ? $phone : '—'),
    "",
    "Messaggio:",
    $message,
    "",
    "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'),
    "Data/Ora: " . date('Y-m-d H:i:s'),
];
$body = implode("\n", $lines);

$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';
$headers[] = 'From: Toolsify Website <no-reply@tuo-dominio.tld>';
$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
$headersStr = implode("\r\n", $headers);

$sent = @mail($to, $subject, $body, $headersStr);

if ($sent) {
    ?>
    <!doctype html>
    <html lang="it">

    <head>
        <meta charset="utf-8">
        <title>Messaggio inviato</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                line-height: 1.5;
                padding: 24px;
                color: #111
            }

            .card {
                max-width: 720px;
                margin: auto;
                border: 1px solid #eee;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .04)
            }

            h1 {
                font-size: 20px;
                margin: 0 0 12px;
                color: #0a7a2f
            }

            p {
                margin: 8px 0
            }

            a.btn {
                display: inline-block;
                margin-top: 16px;
                padding: 10px 14px;
                border-radius: 10px;
                border: 1px solid #ddd;
                text-decoration: none
            }
        </style>
    </head>

    <body>
        <div class="card">
            <h1>Grazie! Il tuo messaggio è stato inviato.</h1>
            <p>Ti risponderemo al più presto all’indirizzo
                <strong><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></strong>.</p>
            <a class="btn" href="/">Torna alla home</a>
        </div>
    </body>

    </html>
    <?php
} else {
    http_response_code(500);
    ?>
    <!doctype html>
    <html lang="it">

    <head>
        <meta charset="utf-8">
        <title>Invio non riuscito</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                line-height: 1.5;
                padding: 24px;
                color: #111
            }

            .card {
                max-width: 720px;
                margin: auto;
                border: 1px solid #eee;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .04)
            }

            h1 {
                font-size: 20px;
                margin: 0 0 12px;
                color: #a10000
            }

            p {
                margin: 8px 0
            }

            a.btn {
                display: inline-block;
                margin-top: 16px;
                padding: 10px 14px;
                border-radius: 10px;
                border: 1px solid #ddd;
                text-decoration: none
            }
        </style>
    </head>

    <body>
        <div class="card">
            <h1>Ops! Qualcosa è andato storto.</h1>
            <p>Non siamo riusciti a inviare l’email. Riprova più tardi oppure contattaci direttamente su
                <strong>support@toolsify.com</strong>.</p>
            <a class="btn" href="javascript:history.back()">Torna al form</a>
        </div>
    </body>

    </html>
    <?php
}
