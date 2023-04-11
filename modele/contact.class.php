<?php

require_once "modele/bdd.class.php";

class contact extends bdd
{
    public function addContactInfos()
    {
        //create a regex expression to check if the phone contains only numbers if not remove these characters and keep only the numbers
        $regex = "/[^0-9]/";
        $phone = preg_replace($regex, "", $_POST["phone"]);
        $req = "INSERT INTO contactForm (date, firstName, lastName, email, phone, message) VALUES (?, ?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), $_POST["firstName"], $_POST["name"], $_POST["email"], $phone, $_POST["message"]));
    }

    public function getContactInfos()
    {
        $req = "SELECT * FROM contactForm";
        return $this->execReq($req);
    }

    public function delContactInfos($id)
    {
        $req = "DELETE FROM contactForm WHERE id_contactForm = ?";
        $this->execReqPrep($req, array($id));
    }
}