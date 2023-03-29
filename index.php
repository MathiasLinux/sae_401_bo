<?php
session_start();
require "includes/default_config.php";
require "controleur/routeur.class.php";
require_once "languages/languages.php";
require_once "modele/user.class.php";


// Creation d'un cookie pour garder la page sur laquelle on se trouve sauf si on est sur la l'url de change de langue
if ($_SERVER["REQUEST_URI"] != "/index.php?lang&lang=en" && $_SERVER["REQUEST_URI"] != "/index.php?lang&lang=fr") {
    setcookie("page", $_SERVER["REQUEST_URI"], time() + 3600, "/");
}

// Récupération du cookie contenant le token de connexion automatique
if (isset($_COOKIE["token"])) {
    $objUser = new User();

    // Récupération de l'id de l'utilisateur
    $id = $objUser->getIdUserFromToken($_COOKIE["token"]);

    // Vérification que l'id existe
    if ($id != null and is_numeric($id)) {
        // Création des variables de session
        $_SESSION["email"] = $objUser->getUserEmail($id);
        $_SESSION["id"] = $id;
        $_SESSION["rights"] = $objUser->getUserRole($id);
    }
}

$objRouteur = new Routeur();
$objRouteur->routeurRequete();