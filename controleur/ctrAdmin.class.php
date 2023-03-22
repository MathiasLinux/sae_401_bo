<?php

require_once "modele/jobs.class.php";
require_once "modele/user.class.php";
require_once "vue/vue.class.php";

class ctrAdmin
{
    public $jobs;
    public $user;

    public function __construct()
    {
        $this->jobs = new jobs();
        $this->user = new user();
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
        $title = "Administration Q&A - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndA");
        $objVue->afficher(array(), $title);
    }


    public function qAndAQuestions()
    {
        $title = "Administration Q&A - Questions - Kaiserstuhl escape";
        $objVue = new vue("AdminQAndAQuestions");
        $objVue->afficher(array(), $title);
    }

    public function job()
    {
        $title = "Administration Job - Kaiserstuhl escape";
        $objVue = new vue("AdminJob");
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

    public function delUser($id)
    {
        $this->user->delUser($id);
        header("Location: index.php?action=admin&page=users");
    }

    public function user()
    {
        $users = $this->user->getUsers();
        $title = "Administration user - Kaiserstuhl escape";
        $objVue = new vue("AdminUser");
        $objVue->afficher(array("users" => $users), $title);
    }

    public function changeUsersRights($id)
    {
        $rights = "";
        if (isset($_POST["superadmin"])) {
            $rights .= "superadmin,";
        }
        if (isset($_POST["editor"])) {
            $rights .= "editor,";
        }
        if (isset($_POST["management"])) {
            $rights .= "management,";
        }
        if (isset($_POST["jobs"])) {
            $rights .= "jobs,";
        }
        //delete last comma
        $rights = substr($rights, 0, -1);
        $this->user->updateRightsUser($id, $rights);
        header("Location: index.php?action=admin&page=users");
    }

}