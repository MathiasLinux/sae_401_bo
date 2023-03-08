<?php
// Ici on require tous les controlleurs
require_once "controleur/ctrPage.class.php";
require_once "controleur/ctrGiftCards.class.php";
require_once "controleur/ctrQAndA.class.php";
require_once "controleur/ctrJobs.class.php";
require_once "controleur/ctrAdmin.class.php";

class routeur
{
    private $ctrPage;
    private $ctrGiftCards;
    private $ctrQAndA;
    private $ctrJobs;
    private $ctrAdmin;

    public function __construct()
    {
        $this->ctrPage = new ctrPage();
        $this->ctrGiftCards = new ctrGiftCards();
        $this->ctrQAndA = new ctrQAndA();
        $this->ctrJobs = new ctrJobs();
        $this->ctrAdmin = new ctrAdmin();
    }

    public function routeurRequete()
    {
        if (isset($_GET["action"])) {
            switch ($_GET["action"]) {
                case "aboutUs":
                    $this->ctrPage->aboutUs();
                    break;
                case "giftCards":
                    $this->ctrGiftCards->giftCards();
                    break;
                case "qAndA":
                    $this->ctrQAndA->qAndA();
                    break;
                case "jobs":
                    $this->ctrJobs->jobs();
                    break;
                case "partners":
                    $this->ctrPage->partners();
                    break;
                case "admin":
                    if (isset($_GET["page"])) {
                        switch ($_GET["page"]) {
                            case "escapeGames":
                                $this->ctrAdmin->escapeGames();
                                break;
                            case "contactForm":
                                $this->ctrAdmin->contactForm();
                                break;
                            case "reservations":
                                $this->ctrAdmin->reservations();
                                break;
                            case "giftCards":
                                $this->ctrAdmin->giftCards();
                                break;
                            case "qAndA":
                                $this->ctrAdmin->qAndA();
                                break;
                            case "jobs":
                                $this->ctrAdmin->jobs();
                                break;
                            default:
                                $this->ctrPage->erreur("Page introuvable");
                                break;
                        }
                    } else {
                        $this->ctrAdmin->admin();
                    }
            }
        } else {
            $this->ctrPage->accueil();
        }
    }
}