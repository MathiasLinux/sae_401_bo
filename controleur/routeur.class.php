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
                case "buyCard":
                    if (isset($_SESSION["email"])) {
                        $this->ctrGiftCards->buyCard();
                    } else {
                        $this->ctrLogin->login();
                    }
                    break;
                case "buyCardValid":
                    if (isset($_SESSION["email"]) and isset($_POST["cardNumber"]) and isset($_POST["cardDate"]) and isset($_POST["cardCVC"]) and isset($_POST["cardName"])) {
                        $this->ctrGiftCards->buyCardValid();
                    } else {
                        $this->ctrLogin->login();
                    }
                    break;
                case "buyCardValidEscape":
                    if (isset($_SESSION["email"]) and isset($_POST["cardNumber"]) and isset($_POST["cardDate"]) and isset($_POST["cardCVC"]) and isset($_POST["cardName"])) {
                        $this->ctrGiftCards->buyCardValidEscape();
                    } else {
                        $this->ctrLogin->login();
                    }
                    break;
                case "buyCardSuccess":
                    if (isset($_SESSION["email"])) {
                        $this->ctrGiftCards->buyCardSuccess();
                    } else {
                        $this->ctrLogin->login();
                    }
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
                    // Ici on vérifie si l'utilisateur est connecté et on l'envoie sur la page admin ou sur la page de connexion si il n'est pas connecté
                    if (isset($_SESSION["email"]) and !empty($_SESSION["rights"])) {
                        if (isset($_GET["page"])) {
                            switch ($_GET["page"]) {
                                case "escapeGames":
                                    // Ici on vérifie si l'utilisateur a les droits pour accéder à la page demandée (ici escapeGames) et on l'envoie sur la page demandée ou sur la page admin si il n'a pas les droits pour accéder à la page demandée (ici escapeGames)
                                    if (str_contains($_SESSION["rights"], "editor") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->escapeGames();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "contactForm":
                                    if (str_contains($_SESSION["rights"], "management") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->contactForm();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "reservations":
                                    if (str_contains($_SESSION["rights"], "management") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->reservations();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "giftCards":
                                    if (str_contains($_SESSION["rights"], "management") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->giftCards();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "delGiftCard":
                                    if (str_contains($_SESSION["rights"], "management") or str_contains($_SESSION["rights"], "superadmin")) {
                                        if (isset($_GET["id"])) {
                                            $this->ctrAdmin->delGiftCard();
                                        } else {
                                            $this->ctrAdmin->giftCards();
                                        }
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "qAndA":
                                    if (str_contains($_SESSION["rights"], "editor") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->qAndA();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "qAndAQuestions":
                                    if (str_contains($_SESSION["rights"], "editor") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $idCat = $_GET['id_qAndACat'];
                                        $this->ctrAdmin->qAndAQuestions($idCat);
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "jobs":
                                    if (str_contains($_SESSION["rights"], "jobs") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->jobs();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "job":
                                    if (str_contains($_SESSION["rights"], "jobs") or str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->job();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "users":
                                    if (str_contains($_SESSION["rights"], "superadmin")) {
                                        $this->ctrAdmin->user();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "addJob":
                                    if (str_contains($_SESSION["rights"], "jobs")) {
                                        $this->ctrAdmin->addJob();
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "delUser":
                                    if (str_contains($_SESSION["rights"], "superadmin")) {
                                        if (isset($_GET["id"])) {
                                            $this->ctrAdmin->delUser($_GET["id"]);
                                        } else {
                                            $this->ctrAdmin->user();
                                        }
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "changeUsersRights":
                                    if (str_contains($_SESSION["rights"], "superadmin")) {
                                        if (isset($_GET["id"])) {
                                            $this->ctrAdmin->changeUsersRights($_GET["id"]);
                                        } else {
                                            $this->ctrAdmin->user();
                                        }
                                    } else {
                                        $this->ctrAdmin->admin();
                                    }
                                    break;
                                case "qAndANewCat_S":
                                    $this->ctrAdmin->qAndANewCat_S();
                                    break;
                                case "qAndAModifyCat":
                                    $idCat = $_GET['id_qAndACat'];
                                    $this->ctrAdmin->qAndAModifyCat($idCat);
                                    break;
                                case "qAndAModifyCat_S":
                                    $idCat = $_GET['id_qAndACat'];
                                    $this->ctrAdmin->qAndAModifyCat_S($idCat);
                                    break;
                                case "qAndAModifyES":
                                    $idCat = $_GET['id_qAndACat'];
                                    $this->ctrAdmin->qAndAModifyEG($idCat);
                                    break;
                                case "qAndADeleteCat":
                                    $idCat = $_GET['id_qAndACat'];
                                    $this->ctrAdmin->qAndADeleteCat($idCat);
                                    break;
                                case "qAndADeleteCat_S":
                                    $idCat = $_GET['id_qAndACat'];
                                    $this->ctrAdmin->qAndADeleteCat_S($idCat);
                                    break;
                                case "qAndAQuestionsAdd_S":
                                    $idCat = $_GET['id_qAndACat'];
                                    $this->ctrAdmin->qAndAQuestionsAdd_S($idCat);
                                    break;
                                case "qAndAQuestionsDelete":
                                    $idQ = $_GET['id_qAndAQ'];
                                    $this->ctrAdmin->qAndAQuestionsDelete($idQ);
                                    break;
                                case "qAndAQuestionsDelete_S":
                                    $idCat = $_GET['id_qAndACat'];
                                    $idQ = $_GET['id_qAndAQ'];
                                    $this->ctrAdmin->qAndAQuestionsDelete_S($idCat, $idQ);
                                    break;
                                case "qAndAQuestionsModify":
                                    $idQ = $_GET['id_qAndAQ'];
                                    $this->ctrAdmin->qAndAQuestionsModify($idQ);
                                    break;
                                case "qAndAQuestionsModify_S":
                                    $idCat = $_GET['id_qAndACat'];
                                    $idQ = $_GET['id_qAndAQ'];
                                    $this->ctrAdmin->qAndAQuestionsModify_S($idCat, $idQ);
                                    break;
                                default:
                                    $this->ctrPage->erreur("Page introuvable");
                                    break;
                            }
                        } else {
                            $this->ctrAdmin->admin();
                        }
                    } else {
                        $this->ctrLogin->login();
                    }
                    break;
                case "lang":
                    // Ici on vérifie si l'utilisateur a cliqué sur le bouton de changement de langue et on change la langue de la session en fonction de la langue choisie
                    if (isset($_GET["lang"])) {
                        switch ($_GET["lang"]) {
                            case "fr":
                                $_SESSION["lang"] = "fr";
                                // Redirection vers la page précédente
                                header("Location: " . $_COOKIE["page"]);
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