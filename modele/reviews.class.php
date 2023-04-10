<?php

require_once "modele/bdd.class.php";
require_once "vue/vue.class.php";

class review extends bdd
{
    public function getReviews()
    {
        $req = "SELECT id_reviews, firstName, lastName, reviews.description, reviews.descriptionFR, rating, reviews.id_escapeGame, id_user, escapeGame.name, escapeGame.nameFR FROM reviews INNER JOIN escapeGame ON reviews.id_escapeGame = escapeGame.id_escapeGame";
        return $this->execReq($req);
    }

    public function delReviews($id)
    {
        $req = "DELETE FROM reviews WHERE id_reviews = ?";
        $this->execReqPrep($req, array($id));
    }

}