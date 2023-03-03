<?php
require_once "config/config.class.php";

$conf = new stdClass(); //Création d'un objet vide
$conf->DBHOST = config::$DBHost ?? "localhost";
$conf->DBUSER = config::$DBUser ?? "root";
$conf->DBNAME = config::DBNAME;
$conf->DBPWD = config::$DBPwd ?? "admin";

global $conf;
