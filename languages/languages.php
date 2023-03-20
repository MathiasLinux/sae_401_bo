<?php
if (!isset($_SESSION['lang']) || empty($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
$fileLang = 'languages/en-lang.php';

if (is_file('languages/' . $_SESSION['lang'] . '-lang.php')) {
    $fileLang = 'languages/' . $_SESSION['lang'] . '-lang.php';
}

require_once $fileLang;