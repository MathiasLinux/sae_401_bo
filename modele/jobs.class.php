<?php

require_once "modele/bdd.class.php";

class jobs extends bdd
{
    public function getJobs()
    {
        $req = "SELECT * FROM jobs";
        $jobs = $this->execReq($req);
        return $jobs;
    }

    public function addJobs($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible)
    {
        $req = "INSERT INTO jobs (title, titleFR, position, positionFR, task, taskFR, strength, strengthFR, visible) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $jobs = $this->execReqPrep($req, array($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible));
        return $jobs;
    }
}