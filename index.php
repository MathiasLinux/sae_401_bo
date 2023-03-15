<?php
session_start();
require "includes/default_config.php";
require "controleur/routeur.class.php";

$objRouteur = new Routeur();
$objRouteur->routeurRequete();