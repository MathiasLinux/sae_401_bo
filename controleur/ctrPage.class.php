<?php

require_once "vue/vue.class.php";

class ctrPage
{
    public function accueil()
    {
        $title = "Home - Kaiserstuhl escape";
        $objVue = new vue("Accueil");
        $objVue->afficher(array(), $title);
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

    public function erreur($message)
    {
        $title = "Page d'erreur - Kaiserstuhl escape";
        $objVue = new vue("Erreur");
        $objVue->afficher(array("message" => $message), $title);
    }
}