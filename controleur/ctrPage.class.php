<?php

require_once "vue/vue.class.php";

class ctrPage
{
    public function accueil()
    {
        $title = "Accueil Kaiserstuhl escape";
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

    public function erreur($message)
    {
        $objVue = new vue("Erreur");
        $objVue->afficher(array("message" => $message));
    }
}