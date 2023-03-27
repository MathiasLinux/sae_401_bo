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

    public function getJobsById($id)
    {
        $req = "SELECT * FROM jobs WHERE id_jobs = ?";
        return $this->execReqPrep($req, array($id))[0];
    }

    public function updateJobs($id, $title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible)
    {
        $req = "UPDATE jobs SET title = ?, titleFR = ?, position = ?, positionFR = ?, task = ?, taskFR = ?, strength = ?, strengthFR = ?, visible = ? WHERE id_jobs = ?";
        $jobs = $this->execReqPrep($req, array($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible, $id));
        return $jobs;
    }

    public function delJobs($id)
    {
        $req = "DELETE FROM jobs WHERE id_jobs = ?";
        $jobs = $this->execReqPrep($req, array($id));
        return $jobs;
    }
}