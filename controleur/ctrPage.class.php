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

    public function erreur($message)
    {
        $objVue = new vue("Erreur");
        $objVue->afficher(array("message" => $message));
    }
}