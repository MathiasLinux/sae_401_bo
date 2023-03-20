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

    public function addQandACat($newCat)
    {
        $req = "INSERT INTO qAndACat(id_qAndACat,title,titleFR,id_escapeGame) VALUES (?,?,?,?)";
        $qAndACat = $this->execReqPrep($req, array(null,$newCat,"",null));
        if ($qAndACat==1)
            return TRUE;
        else
            return FALSE;
    }

    public function getOneQandACat($idCat)
    {
        $req = "SELECT * FROM qAndACat WHERE id_qAndACat = ?";
        $data = array($idCat);
        $qAndACat = $this->execReqPrep($req, $data);
        return $qAndACat[0];
    }

    public function updateQandACat($nameCat,$idCat)
    {
        $req = "UPDATE qAndACat SET title = ? WHERE id_qAndACat = ?";
        $data = array($nameCat,$idCat);
        $qAndACat = $this->execReqPrep($req, $data);
        if ($qAndACat==1)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteQandACat($idCat)
    {
        $req = "DELETE FROM qAndACat WHERE id_qAndACat = ?";
        $data = array($idCat);
        $qAndACat = $this->execReqPrep($req, $data);
        if ($qAndACat==1)
            return TRUE;
        else
            return FALSE;
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
        $qAndAQ = $this->execReqPrep($req, $data);
        return $qAndAQ;
    }

    public function getOneQandAQuestion($idQ)
    {
        $req = "SELECT * FROM qAndAQuestion WHERE id_qAndAQuestion = ?";
        $data = array($idQ);
        $qAndAQ = $this->execReqPrep($req, $data);
        return $qAndAQ[0];
    }

    public function addQandAQuestion($question,$answer,$idCat)
    {
        $req = "INSERT INTO qAndAQuestion(id_qAndAQuestion,title,titleFR,answer,answerFR,id_qAndACat) VALUES (?,?,?,?,?,?)";
        $qAndAQ = $this->execReqPrep($req, array(null,$question,"",$answer,'',$idCat));
        if ($qAndAQ==1)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteQandAQuestion($idQ)
    {
        $req = "DELETE FROM qAndAQuestion WHERE id_qAndAQuestion = ?";
        $data = array($idQ);
        $qAndACat = $this->execReqPrep($req, $data);
        if ($qAndACat==1)
            return TRUE;
        else
            return FALSE;
    }
}