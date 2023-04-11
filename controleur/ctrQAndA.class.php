<?php

require_once "modele/qAndA.class.php";
require_once "vue/vue.class.php";

class ctrQAndA
{
    private $qAndA;

    public function __construct()
    {
        $this->qAndA = new qAndA();
    }

    public function qAndA()
    {
        $qAndACat = $this->qAndA->getQandACat();
        $allQAndAQuestions = $this->qAndA->getAllQandAQuestions();
        if ($_SESSION['lang'] == "fr") {
            $title = "FAQ - Kaiserstuhl escape";
        } else {
            $title = "Q&A - Kaiserstuhl escape";
        }
        $objVue = new vue("QAndA");
        $objVue->afficher(array("qAndACat" => $qAndACat, "allQAndAQuestions" => $allQAndAQuestions), $title);
    }
}