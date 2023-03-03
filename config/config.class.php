<?php

abstract class config
{
    // Definition des paramètres de la BDD
    public const DBNAME = "sae401";
    public static $DBHost = "localhost";

    // Définition des paramètres du site
    public static $DBUser = "root";      // Titre affiché dans le header

    // Menu par défaut
    public static $DBPwd = "MOTDEPASSE";
}