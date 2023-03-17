<?php

require_once "modele/contact.class.php";
require_once "vue/vue.class.php";

class ctrContact
{
    public $contact;

    public function __construct()
    {
        $this->contact = new contact();
    }

    public function contact()
    {
        $title = "Contact - Kaiserstuhl escape";
        $objVue = new vue("Contact");
        $objVue->afficher(array(), $title);
    }

    public function sendForm()
    {
        $this->contact->addContactInfos();
        header("Location: index.php");
    }
}