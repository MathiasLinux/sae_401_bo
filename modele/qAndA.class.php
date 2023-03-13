<?php
require_once "modele/bdd.class.php";

class qAndA extends bdd
{
    public function getQandACat()
    {
        $req = "SELECT * FROM qAndACat";
        $qAndACat = $this->execReq($req);
        return $qAndACat;
    }

    public function getAllQandAQuestions()
    {
        $req = "SELECT * FROM qAndAQuestion";
        $qAndAQuestions = $this->execReq($req);
        return $qAndAQuestions;
    }

    public function getQandAQuestions($idCat)
    {
        $req = "SELECT * FROM qAndAQuestion WHERE id_qAndACat = ?";
        $data = array($idCat);
        $qAndAQuestions = $this->execReqPrep($req, $data);
        return $qAndAQuestions;
    }
}