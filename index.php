<?php
session_start();
require "includes/default_config.php";
require "controleur/routeur.class.php";
require_once "languages/languages.php";

if ($_SERVER["REQUEST_URI"] != "/index.php?lang&lang=en" && $_SERVER["REQUEST_URI"] != "/index.php?lang&lang=fr") {
    setcookie("page", $_SERVER["REQUEST_URI"], time() + 3600, "/");
}

var_dump($_SESSION);
echo "Location: " . $_SERVER["REQUEST_URI"];

$objRouteur = new Routeur();
$objRouteur->routeurRequete();