<?php

// Controlla se sei in locale o in produzione
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    define('BASE_URL', 'http://localhost/Toolsify/');
} else {
    define('BASE_URL', 'https://usetoolsify.com/');
}

define('BASE_PATH', __DIR__);

// Cartelle principali
define('IMG_URL', BASE_URL . 'images/');
define('CSS_URL', BASE_URL . 'style.css');
define('JS_URL', BASE_URL . 'script.js');

define('COMPONENTS_PATH', BASE_PATH . '/components/');