<?php
require_once "modele/bdd.class.php";

class qAndA extends bdd
{
    // Select all information in the table : qAndACat
    public function getQandACat()
    {
        $req = "SELECT * FROM qAndACat";
        $qAndACat = $this->execReq($req);
        return $qAndACat;
    }

    // Add a Q&A category
    public function addQandACat($newCat, $newCatFR)
    {
        $req = "INSERT INTO qAndACat(id_qAndACat,title,titleFR,id_escapeGame) VALUES (?,?,?,?)";
        $qAndACat = $this->execReqPrep($req, array(null, $newCat, $newCatFR, null));
        if ($qAndACat == 1)
            return TRUE;
        else
            return FALSE;
    }

    // Modify the name of a Q&A category
    public function updateQandACat($nameCat, $nameCatFR, $idCat)
    {
        $actualNameCat = $this->getOneQandACat($idCat);
        if ($actualNameCat['title'] !== $nameCat || $actualNameCat['titleFR'] !== $nameCatFR) {
            $req = "UPDATE qAndACat SET title = ?, titleFR = ? WHERE id_qAndACat = ?";
            $data = array($nameCat, $nameCatFR, $idCat);
            $qAndACat = $this->execReqPrep($req, $data);
            if ($qAndACat == 1)
                return TRUE;
            else
                return FALSE;
        }
        else
            return TRUE;
    }

    // Select all information of a Q&A category
    public function getOneQandACat($idCat)
    {
        $req = "SELECT * FROM qAndACat WHERE id_qAndACat = ?";
        $data = array($idCat);
        $qAndACat = $this->execReqPrep($req, $data);
        if($qAndACat!=null)
            return $qAndACat[0];
        else
            return $qAndACat;
    }

    // Delete a Q&A category
    public function deleteQandACat($idCat)
    {
        $actualIdCat = $this->getOneQandACat($idCat);
        if($actualIdCat!=null){
            $req = "DELETE FROM qAndACat WHERE id_qAndACat = ?";
            $data = array($idCat);
            $qAndACat = $this->execReqPrep($req, $data);
            if ($qAndACat == 1)
                return TRUE;
            else
                return FALSE;
        }
        else
            return TRUE;
    }

    // Modify the association between a Q&A category and an escape game
    public function updateQAndAEG($idEG,$idCat){
        if($idEG==0)
            $idEG = NULL;
        $actualIdEG = $this->getOneQandACat($idCat);
        if($actualIdEG["id_escapeGame"]!==$idEG){
            $req ="UPDATE qAndACat SET id_escapeGame = ? WHERE id_qAndACat = ?";
            $data = array($idEG,$idCat);
            $qAndACat = $this->execReqPrep($req, $data);
            if ($qAndACat == 1)
                return TRUE;
            else
                return FALSE;
        }
        else
            return TRUE;

    }

    // Select all information in the table : qAndAQuestion
    public function getAllQandAQuestions()
    {
        $req = "SELECT * FROM qAndAQuestion";
        $qAndAQuestions = $this->execReq($req);
        return $qAndAQuestions;
    }

    // Select all questions of a Q&A category 
    public function getQandAQuestions($idCat)
    {
        $req = "SELECT * FROM qAndAQuestion WHERE id_qAndACat = ?";
        $data = array($idCat);
        $qAndAQ = $this->execReqPrep($req, $data);
        return $qAndAQ;
    }

    // Select all information of a Q&A question
    public function getOneQandAQuestion($idQ)
    {
        $req = "SELECT * FROM qAndAQuestion WHERE id_qAndAQuestion = ?";
        $data = array($idQ);
        $qAndAQ = $this->execReqPrep($req, $data);
        if($qAndAQ!=null)
            return $qAndAQ[0];
        else
            return $qAndAQ;
    }

    // Add a Q&A question
    public function addQandAQuestion($question, $answer, $questionFR, $answerFR, $idCat)
    {
        $req = "INSERT INTO qAndAQuestion(id_qAndAQuestion,title,titleFR,answer,answerFR,id_qAndACat) VALUES (?,?,?,?,?,?)";
        $qAndAQ = $this->execReqPrep($req, array(null, $question, $questionFR, $answer, $answerFR, $idCat));
        if ($qAndAQ == 1)
            return TRUE;
        else
            return FALSE;
    }

    // Modify a Q&A question
    public function updateQandAQuestion($question, $answer, $questionFR, $answerFR, $idQ)
    {
        $actualQAndAQ = $this->getOneQandAQuestion($idQ);
        if($actualQAndAQ['title']!==$question || $actualQAndAQ['answer']!==$answer || $actualQAndAQ['titleFR']!==$questionFR || $actualQAndAQ['answerFR']!==$answerFR){
            $req = "UPDATE qAndAQuestion SET title = ?, answer = ?, titleFR = ?, answerFR = ? WHERE id_qAndAQuestion = ?";
            $data = array($question, $answer, $questionFR, $answerFR, $idQ);
            $qAndAQ = $this->execReqPrep($req, $data);
            if ($qAndAQ == 1)
                return TRUE;
            else
                return FALSE;
        }
        else
            return TRUE;
    }

    // Delete a Q&A question
    public function deleteQandAQuestion($idQ)
    {
        $actualQAndAQ = $this->getOneQandAQuestion($idQ);
        if($actualQAndAQ!=null){
            $req = "DELETE FROM qAndAQuestion WHERE id_qAndAQuestion = ?";
            $data = array($idQ);
            $qAndACat = $this->execReqPrep($req, $data);
            if ($qAndACat == 1)
                return TRUE;
            else
                return FALSE;
        }
        else
            return TRUE;
    }
}