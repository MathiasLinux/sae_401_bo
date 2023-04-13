<?php

require_once "modele/bdd.class.php";

class contact extends bdd
{
    /*******
     * A function to add the contact infos in the database with the POST method
     * @return void
     */
    public function addContactInfos()
    {
        //create a regex expression to check if the phone contains only numbers if not remove these characters and keep only the numbers
        $regex = "/[^0-9]/";
        $phone = preg_replace($regex, "", $_POST["phone"]);
        $req = "INSERT INTO contactForm (date, firstName, lastName, email, phone, message) VALUES (?, ?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), $_POST["firstName"], $_POST["name"], $_POST["email"], $phone, $_POST["message"]));
    }

    /*******
     * A function to get all the contact infos from the database
     * @return array
     */
    public function getContactInfos()
    {
        $req = "SELECT * FROM contactForm";
        return $this->execReq($req);
    }

    /*******
     * A function to delete a contact info from the database
     * @param int $id the id of the contact info to delete
     * @return void
     */
    public function delContactInfos($id)
    {
        $req = "DELETE FROM contactForm WHERE id_contactForm = ?";
        $this->execReqPrep($req, array($id));
    }
}