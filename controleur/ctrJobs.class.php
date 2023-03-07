<?php

require_once "vue/vue.class.php";

class ctrJobs
{
    public function jobs()
    {
        $title = "Jobs - Kaiserstuhl escape";
        $objVue = new vue("Jobs");
        $objVue->afficher(array(), $title);
    }
}