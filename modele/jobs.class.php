<?php

require_once "modele/bdd.class.php";

class jobs extends bdd
{
    /*******
     * A function to get all the jobs offer
     * @return array|false
     */
    public function getJobs()
    {
        $req = "SELECT * FROM jobs";
        $jobs = $this->execReq($req);
        return $jobs;
    }

    /*******
     * A function to get all the jobs offer that are visible
     * @return array|false
     */
    public function getJobsVisible()
    {
        $req = "SELECT * FROM jobs WHERE visible = 1";
        $jobs = $this->execReq($req);
        return $jobs;
    }

    /*******
     * A function to add a job offer
     * @param $title string the title of the job offer
     * @param $titleFR string the title of the job offer in french
     * @param $position string the position of the job offer
     * @param $positionFR string the position of the job offer in french
     * @param $task string the task of the job offer
     * @param $taskFR string the task of the job offer in french
     * @param $strength string the strength of the job offer
     * @param $strengthFR string the strength of the job offer in french
     * @param $visible int the visibility of the job offer
     * @return array|false|int
     */
    public function addJobs($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible)
    {
        $req = "INSERT INTO jobs (title, titleFR, position, positionFR, task, taskFR, strength, strengthFR, visible) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $jobs = $this->execReqPrep($req, array($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible));
        return $jobs;
    }

    /*******
     * A function to get a job offer by his id
     * @param $id int the id of the job offer
     * @return array|false
     */
    public function getJobsById($id)
    {
        $req = "SELECT * FROM jobs WHERE id_jobs = ?";
        return $this->execReqPrep($req, array($id))[0];
    }

    /*******
     * A function to update a job offer
     * @param $id int the id of the job offer
     * @param $title string the title of the job offer
     * @param $titleFR string the title of the job offer in french
     * @param $position string the position of the job offer
     * @param $positionFR string the position of the job offer in french
     * @param $task string the task of the job offer
     * @param $taskFR string the task of the job offer in french
     * @param $strength string the strength of the job offer
     * @param $strengthFR string the strength of the job offer in french
     * @param $visible int the visibility of the job offer
     * @return array|false|int
     */
    public function updateJobs($id, $title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible)
    {
        $req = "UPDATE jobs SET title = ?, titleFR = ?, position = ?, positionFR = ?, task = ?, taskFR = ?, strength = ?, strengthFR = ?, visible = ? WHERE id_jobs = ?";
        $jobs = $this->execReqPrep($req, array($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible, $id));
        return $jobs;
    }

    /*******
     * A function to delete a job offer
     * @param $id int the id of the job offer
     * @return array|false|int
     */
    public function delJobs($id)
    {
        $req = "DELETE FROM jobs WHERE id_jobs = ?";
        $jobs = $this->execReqPrep($req, array($id));
        return $jobs;
    }
}