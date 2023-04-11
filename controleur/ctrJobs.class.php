<?php

require_once "modele/jobs.class.php";
require_once "vue/vue.class.php";

class ctrJobs
{
    public $jobs;

    public function __construct()
    {
        $this->jobs = new jobs();
    }

    public function jobs()
    {
        $jobs = $this->jobs->getJobsVisible();
        $title = "Jobs - Kaiserstuhl escape";
        $objVue = new vue("Jobs");
        $objVue->afficher(array("jobs" => $jobs), $title);
    }
}