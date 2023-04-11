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
        if (isset($_POST["firstName"]) and isset($_POST["name"]) and isset($_POST["email"]) and isset ($_POST["phone"]) and isset($_POST["message"])) {
            $this->contact->addContactInfos();
            header("Location: index.php");
        } else {
            header("Location: index.php?action=contact");
        }
    }
}