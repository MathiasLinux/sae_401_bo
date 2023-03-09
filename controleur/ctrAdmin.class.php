<?php

require_once "vue/vue.class.php";

class ctrAdmin
{
    public function admin()
    {
        $title = "Administration - Kaiserstuhl escape";
        $objVue = new vue("Admin");
        $objVue->afficher(array(), $title);
    }

    public function escapeGames()
    {
        $title = "Administration Escape Games - Kaiserstuhl escape";
        $objVue = new vue("AdminEscapeGames");
        $objVue->afficher(array(), $title);
    }

    public function contactForm()
    {
        $title = "Administration Contact Form - Kaiserstuhl escape";
        $objVue = new vue("AdminContactForm");
        $objVue->afficher(array(), $title);
    }

    public function reservations()
    {
        $title = "Administration Reservation - Kaiserstuhl escape";
        $objVue = new vue("AdminReservations");
        $objVue->afficher(array(), $title);
    }

    public function giftCards()
    {
        $title = "Administration Gift Cards - Kaiserstuhl escape";
        $objVue = new vue("AdminGiftCards");
        $objVue->afficher(array(), $title);
    }

    public function qAndA()
    {
        $title = "Administration Q&A - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndA");
        $objVue->afficher(array(), $title);
    }

    public function jobs()
    {
        $title = "Administration Jobs - Kaiserstuhl escape";
        $objVue = new vue("AdminJobs");
        $objVue->afficher(array(), $title);
    }

    public function job()
    {
        $title = "Administration Job - Kaiserstuhl escape";
        $objVue = new vue("AdminJob");
        $objVue->afficher(array(), $title);
    }
}