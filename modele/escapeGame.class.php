<?php

require_once "modele/bdd.class.php";
require_once "vue/vue.class.php";

class escapeGame extends bdd
{
    public function getEscapeGames()
    {
        $req = "SELECT * FROM escapeGame";
        return $this->execReq($req);
    }

    public function getNameEscapeGames()
    {
        $req = "SELECT id_escapeGame, name, nameFR FROM escapeGame";
        return $this->execReq($req);
    }

    public function getEscapeGame($id)
    {
        $req = "SELECT * FROM escapeGame WHERE id_escapeGame = ?";
        $escapeGame = $this->execReqPrep($req, array($id));
        return $escapeGame[0]["name"];
    }

    public function getPriceEscapeGame($id, $nbPersons)
    {
        $ligne = "";
        if ($nbPersons <= 3) {
            $ligne = "price2_3Persons";
        } elseif ($nbPersons == 4) {
            $ligne = "price4Persons";
        } elseif ($nbPersons == 5) {
            $ligne = "price5Persons";
        } elseif ($nbPersons == 6) {
            $ligne = "price6Persons";
        } elseif ($nbPersons == 7) {
            $ligne = "price7Persons";
        } elseif ($nbPersons == 8) {
            $ligne = "price8Persons";
        } elseif ($nbPersons == 9) {
            $ligne = "price9Persons";
        } elseif ($nbPersons == 10) {
            $ligne = "price10Persons";
        } elseif ($nbPersons == 11) {
            $ligne = "price11Persons";
        } elseif ($nbPersons == 12) {
            $ligne = "price12Persons";
        } elseif ($nbPersons > 12) {
            $ligne = "price12PlusPersons";
        }

        $req = "SELECT $ligne FROM escapeGame WHERE id_escapeGame = ?";
        $escapeGame = $this->execReqPrep($req, array($id));
        return $escapeGame[0][$ligne];
    }

    public function getFrontEscapeGames()
    {
        $req = "SELECT * FROM escapeGame WHERE onFront = 1";
        $escapeGames = $this->execReq($req);
        return $escapeGames[0];
    }

    public function getEscapeGamesWithoutFront()
    {
        $req = "SELECT * FROM escapeGame WHERE onFront = 0";
        $escapeGames = $this->execReq($req);
        return $escapeGames;
    }

}