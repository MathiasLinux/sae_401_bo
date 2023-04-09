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
        $title = "Home - Kaiserstuhl escape";
        $objVue = new vue("Accueil");
        $objVue->afficher(array("frontEscape" => $frontEscape, "escapeGames" => $escapeGames, "reviews" => $reviews), $title);
    }

    public function aboutUs()
    {
        $title = "About us - Kaiserstuhl escape";
        $objVue = new vue("AboutUs");
        $objVue->afficher(array(), $title);
    }

    public function partners()
    {
        $title = "Our Partners - Kaiserstuhl escape";
        $objVue = new vue("Partners");
        $objVue->afficher(array(), $title);
    }

    public function legalNotice()
    {
        $title = "Legal Notice - Kaiserstuhl escape";
        $objVue = new vue("LegalNotice");
        $objVue->afficher(array(), $title);
    }

    public function privacyPolicy()
    {
        $title = "Privacy Policy - Kaiserstuhl escape";
        $objVue = new vue("PrivacyPolicy");
        $objVue->afficher(array(), $title);
    }

    public function tAndC()
    {
        $title = "Terms and Conditions - Kaiserstuhl escape";
        $objVue = new vue("TAndC");
        $objVue->afficher(array(), $title);
    }

    public function erreur($message)
    {
        $title = "Page d'erreur - Kaiserstuhl escape";
        $objVue = new vue("Erreur");
        $objVue->afficher(array("message" => $message), $title);
    }
}