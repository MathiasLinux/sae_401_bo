<?php
session_start();
require "includes/default_config.php";
require "controleur/routeur.class.php";
require_once "languages/languages.php";


// Creation d'un cookie pour garder la page sur laquelle on se trouve sauf si on est sur la l'url de change de langue
if ($_SERVER["REQUEST_URI"] != "/index.php?lang&lang=en" && $_SERVER["REQUEST_URI"] != "/index.php?lang&lang=fr") {
    setcookie("page", $_SERVER["REQUEST_URI"], time() + 3600, "/");
}

$objRouteur = new Routeur();
$objRouteur->routeurRequete();