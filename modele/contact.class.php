<?php

require_once "modele/bdd.class.php";

class contact extends bdd
{
    public function addContactInfos()
    {
        $req = "INSERT INTO contactForm (date, firstName, lastName, email, phone, message) VALUES (?, ?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), $_POST["firstName"], $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["message"]));
    }

}