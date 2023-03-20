<?php
// Ici on require tous les controlleurs
require_once "controleur/ctrPage.class.php";
require_once "controleur/ctrGiftCards.class.php";
require_once "controleur/ctrQAndA.class.php";
require_once "controleur/ctrJobs.class.php";
require_once "controleur/ctrEscapeGames.class.php";
require_once "controleur/ctrContact.class.php";
require_once "controleur/ctrAdmin.class.php";
require_once "controleur/ctrLogin.class.php";

/**********
 * Classe permettant de gérer les différentes pages
 *********/
class routeur
{
    private $ctrPage;
    private $ctrGiftCards;
    private $ctrQAndA;
    private $ctrJobs;
    private $ctrEscapeGames;
    private $ctrContact;
    private $ctrAdmin;
    private $ctrLogin;

    public function __construct()
    {
        $this->ctrPage = new ctrPage();
        $this->ctrGiftCards = new ctrGiftCards();
        $this->ctrQAndA = new ctrQAndA();
        $this->ctrJobs = new ctrJobs();
        $this->ctrEscapeGames = new ctrEscapeGames();
        $this->ctrContact = new ctrContact();
        $this->ctrAdmin = new ctrAdmin();
        $this->ctrLogin = new ctrLogin();
    }

    /*******************
     * Fonction qui gère les différentes pages
     *******************/
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
                case "escapeGames":
                    $this->ctrEscapeGames->escapeGames();
                    break;
                case "escapeGame":
                    $this->ctrEscapeGames->escapeGame();
                    break;
                case "contact":
                    $this->ctrContact->contact();
                    break;
                case "sendForm":
                    $this->ctrContact->sendForm();
                    break;
                case "legal":
                    $this->ctrPage->legalNotice();
                    break;
                case "privacy":
                    $this->ctrPage->privacyPolicy();
                    break;
                case "login":
                    $this->ctrLogin->login();
                    break;
                case "signUp":
                    $this->ctrLogin->signUp();
                    break;
                case "createAccount":
                    $this->ctrLogin->createAccount();
                    break;
                case "connexion":
                    $this->ctrLogin->connexion();
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
                            case "qAndAQuestions":
                                $this->ctrAdmin->qAndAQuestions();
                                break;
                            case "jobs":
                                $this->ctrAdmin->jobs();
                                break;
                            case "job":
                                $this->ctrAdmin->job();
                                break;

                            case "users":
                                $this->ctrAdmin->user();
                                break;

                            case "addJob":
                                $this->ctrAdmin->addJob();
                                break;
                            default:
                                $this->ctrPage->erreur("Page introuvable");
                                break;
                        }
                    } else {
                        $this->ctrAdmin->admin();
                    }
                case "lang":
                    if (isset($_GET["lang"])) {
                        switch ($_GET["lang"]) {
                            case "fr":
                                $_SESSION["lang"] = "fr";
                                //encode the url to avoid special characters
                                header("Location: " . $_COOKIE["page"]);
                                //header("Location: " . $_SERVER["REQUEST_URI"]);
                                break;
                            case "en":
                                $_SESSION["lang"] = "en";
                                header("Location: " . $_COOKIE["page"]);
                                break;

                        }
                    }
                    break;
                default :
                    header("Location: index.php");
                    break;
            }
        } else {
            $this->ctrPage->accueil();
        }
    }
}