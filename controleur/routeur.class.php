<?php
// Ici on require tous les controlleurs
require_once "controleur/ctrPage.class.php";

class routeur
{
    private $ctrPage;

    public function __construct()
    {
        $this->ctrPage = new ctrPage();
    }
    public function routeurRequete()
    {
        $this->ctrPage->accueil();
    }
}