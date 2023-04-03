<?php

require_once "modele/bdd.class.php";
require_once "vue/vue.class.php";

class review extends bdd
{
    public function getReviews()
    {
        $req = "SELECT * FROM reviews";
        return $this->execReq($req);
    }
}