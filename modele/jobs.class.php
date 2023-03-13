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
}