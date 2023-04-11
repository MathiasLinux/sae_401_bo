<?php

require_once "modele/escapeGame.class.php";
require_once "modele/reviews.class.php";
require_once "vue/vue.class.php";

class ctrPage
{
    public $objEscapeGame;
    public $objReview;

    public function __construct()
    {
        $this->objEscapeGame = new escapeGame();
        $this->objReview = new review();
    }

    public function accueil()
    {
        if ($this->objEscapeGame->getFrontEscapeGames())
            $frontEscape = $this->objEscapeGame->getFrontEscapeGames();
        else
            $frontEscape = $this->objEscapeGame->getEscapeGames()[0];
        $escapeGames = $this->objEscapeGame->getEscapeGamesWithoutFront();
        $reviews = $this->objReview->getReviews();
        if ($_SESSION['lang'] == "fr") {
            $title = "Accueil - Kaiserstuhl escape";
        } else {
            $title = "Home - Kaiserstuhl escape";
        }
        $objVue = new vue("Accueil");
        $objVue->afficher(array("frontEscape" => $frontEscape, "escapeGames" => $escapeGames, "reviews" => $reviews), $title);
    }

    public function aboutUs()
    {
        if ($_SESSION['lang'] == "fr") {
            $title = "À propos - Kaiserstuhl escape";
        } else {
            $title = "About us - Kaiserstuhl escape";
        }
        $objVue = new vue("AboutUs");
        $objVue->afficher(array(), $title);
    }

    public function partners()
    {
        if ($_SESSION['lang'] == "fr") {
            $title = "Nos partenaires - Kaiserstuhl escape";
        } else {
            $title = "Our Partners - Kaiserstuhl escape";
        }
        $objVue = new vue("Partners");
        $objVue->afficher(array(), $title);
    }

    public function legalNotice()
    {
        if ($_SESSION['lang'] == "fr") {
            $title = "Mentions légales - Kaiserstuhl escape";
        } else {
            $title = "Legal Notice - Kaiserstuhl escape";
        }
        $objVue = new vue("LegalNotice");
        $objVue->afficher(array(), $title);
    }

    public function privacyPolicy()
    {
        if ($_SESSION['lang'] == "fr") {
            $title = "Politique de confidentialité - Kaiserstuhl escape";
        } else {
            $title = "Privacy Policy - Kaiserstuhl escape";
        }
        $objVue = new vue("PrivacyPolicy");
        $objVue->afficher(array(), $title);
    }

    public function tAndC()
    {
        if ($_SESSION['lang'] == "fr") {
            $title = "Conditions générales - Kaiserstuhl escape";
        } else {
            $title = "Terms and Conditions - Kaiserstuhl escape";
        }
        $objVue = new vue("TAndC");
        $objVue->afficher(array(), $title);
    }

    public function erreur($message)
    {
        if ($_SESSION['lang'] == "fr") {
            $title = "Page d'erreur - Kaiserstuhl escape";
        } else {
            $title = "Error page - Kaiserstuhl escape";
        }
        $objVue = new vue("Erreur");
        $objVue->afficher(array("message" => $message), $title);
    }
}