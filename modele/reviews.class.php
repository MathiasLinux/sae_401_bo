<?php

require_once "modele/bdd.class.php";
require_once "vue/vue.class.php";

class review extends bdd
{
    /*********
     * A function to get all the reviews
     * @return array|false
     */
    public function getReviews()
    {
        $req = "SELECT id_reviews, firstName, lastName, reviews.description, reviews.descriptionFR, rating, reviews.id_escapeGame, id_user, escapeGame.name, escapeGame.nameFR FROM reviews INNER JOIN escapeGame ON reviews.id_escapeGame = escapeGame.id_escapeGame";
        return $this->execReq($req);
    }

    /*******
     * A function to delete a review
     * @param $id int the id of the review to delete
     * @return void
     */
    public function delReviews($id)
    {
        $req = "DELETE FROM reviews WHERE id_reviews = ?";
        $this->execReqPrep($req, array($id));
    }

}