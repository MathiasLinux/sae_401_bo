<?php

require_once "modele/jobs.class.php";
require_once "modele/qAndA.class.php";
require_once "vue/vue.class.php";

class ctrAdmin
{
    public $jobs;
    public $qAndAs;

    public function __construct()
    {
        $this->jobs = new jobs();
        $this->qAndAs = new qAndA();
    }

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
        $qAndAs = $this->qAndAs->getQandACat();
        $title = "Administration Q&A - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndA");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndANewCat_S()
    {
        extract($_POST);
        if(!empty($newCat) && !empty($newCatFR)){
            if($this->qAndAs->addQandACat($newCat, $newCatFR))
                $this->qAndA();
            else
                throw new Exception("An error occured during the adding process");
        }
        else
            $this->qAndA();
    }

    public function qAndAQuestions($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        $qAndAQs = $this->qAndAs->getQandAQuestions($idCat);
        $title = "Administration Q&A - Questions - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndAQuestions");
        $objVue->afficher(array("qAndAQs" => $qAndAQs, "qAndAs" => $qAndAs), $title);
    }

    public function qAndAQuestionsAdd_S($idCat)
    {
        extract($_POST);
        if(!empty($question) && !empty($answer) && !empty($questionFR) && !empty($answerFR)){
            if($this->qAndAs->addQandAQuestion($question,$answer,$questionFR,$answerFR,$idCat))
                $this->qAndAQuestions($idCat);
            else
                throw new Exception("An error occured during the adding process");
        }
        else
            $this->qAndAQuestions($idCat);
    }

    public function qAndAQuestionsDelete($idQ)
    {
        $qAndAQs = $this->qAndAs->getOneQandAQuestion($idQ);
        $title = "Administration Q&A - Delete a Q&A - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndAQuestionsDelete");
        $objVue->afficher(array("qAndAQs" => $qAndAQs), $title);
    }

    public function qAndAQuestionsDelete_S($idCat,$idQ)
    {
        if($this->qAndAs->deleteQandAQuestion($idQ))
            $this->qAndAQuestions($idCat);
        else
            throw new Exception("An error occured during the delete process");
    }

    public function qAndAQuestionsModify($idQ)
    {
        $qAndAQs = $this->qAndAs->getOneQandAQuestion($idQ);
        $title = "Administration Q&A - Modify a Q&A - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndAQuestionsModify");
        $objVue->afficher(array("qAndAQs" => $qAndAQs), $title);
    }

    public function qAndAQuestionsModify_S($idCat,$idQ)
    {
        extract($_POST);
        if(!empty($question) && !empty($answer) && !empty($questionFR) && !empty($answerFR)){
            if($this->qAndAs->updateQandAQuestion($question,$answer,$questionFR,$answerFR,$idQ))
                $this->qAndAQuestions($idCat);
            else
                throw new Exception("An error occured during the modify process");
        }
        else
            $this->qAndAQuestions($idCat);
    }

    public function qAndAModifyCat($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        $title = "Administration Q&A - Modify category - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndAModifyCat");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndAModifyCat_S($idCat)
    {
        extract($_POST);
        if(!empty($nameCat)){
            if($this->qAndAs->updateQandACat($nameCat,$idCat))
                $this->qAndA();
            else
                throw new Exception("An error occured during the update process");
        }
        else
            $this->qAndAModifyCat($idCat);
    }

    public function qAndAModifyEG($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        $title = "Administration Q&A - Modify escape game - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndAModifyEG");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndADeleteCat($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        $title = "Administration Q&A - Delete category - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndADeleteCat");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndADeleteCat_S($idCat)
    {
        if($this->qAndAs->deleteQandACat($idCat))
            $this->qAndA();
        else
            throw new Exception("An error occured during the delete process");
    }

    public function job()
    {
        $title = "Administration Job - Kaiserstuhl escape";
        $objVue = new vue("AdminJob");
        $objVue->afficher(array(), $title);
    }


    public function user()
    {
        $title = "Administration user - Kaiserstuhl escape";
        $objVue = new vue("AdminUser");
        $objVue->afficher(array(), $title);
    }

    public function addJob()
    {
        var_dump($_POST);
        $title = $_POST["title"] ?? "";
        $titleFR = $_POST["titleFR"] ?? "";
        $position = $_POST["position"] ?? "";
        $positionFR = $_POST["positionFR"] ?? "";
        $task = $_POST["task"] ?? "";
        $taskFR = $_POST["taskFR"] ?? "";
        $strength = $_POST["strength"] ?? "";
        $strengthFR = $_POST["strengthFR"] ?? "";

        if (isset($_POST["visible"])) {
            $visible = 1;
        } else {
            $visible = 0;
        }
        $this->jobs->addJobs($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible);
        $this->jobs();

    }

    public function jobs()
    {
        $jobs = $this->jobs->getJobs();
        $title = "Administration Jobs - Kaiserstuhl escape";
        $objVue = new vue("AdminJobs");
        $objVue->afficher(array("jobs" => $jobs), $title);
    }

}