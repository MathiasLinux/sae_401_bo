<?php

// Fichier de configuration d'exemple à modifier et renommer en config.class.php
// Example configuration file to be modified and renamed to config.class.php
abstract class config
{
    // Definition des paramètres de la BDD
    public const DBNAME = "sae401";
    public static $DBHost = "localhost";

    // Définition des paramètres du site
    public static $DBUser = "UTILISATEUR";      // Entrez le nom d'utilisateur ici

    // Menu par défaut
    public static $DBPwd = "MOTDEPASSE"; // Entrez le mot de passe ici
}