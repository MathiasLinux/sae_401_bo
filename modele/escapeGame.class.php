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

    public function getEscapeGame($idEG)
    {
        $req = "SELECT * FROM escapeGame WHERE id_escapeGame = ?";
        $escapeGame = $this->execReqPrep($req, array($idEG));
        return $escapeGame[0];
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

    public function getAllReservations()
    {
        $req = "SELECT DATE_FORMAT(gameDate, '%d/%m/%Y') AS gameDateDisplay, hours, eG.name, eG.nameFR, nbPlayers, buyersFirstName, buyersLastName, id_buying from buying INNER JOIN escapeGame eG on buying.id_escapeGame = eG.id_escapeGame;";
        return $this->execReq($req);
    }

    public function delReservation($id)
    {
        $req = "DELETE FROM buying WHERE id_buying = ?";
        $this->execReqPrep($req, array($id));
    }

    public function addXY($latitudeX, $longitudeY, $idEG)
    {
        $req = "UPDATE escapeGame SET x = ?, y = ? WHERE escapeGame.id_escapeGame = ?";
        $data = array($latitudeX, $longitudeY, $idEG);
        $coordonnees = $this->execReqPrep($req, $data);

        if ($coordonnees == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getReviewEG($id)
    {
        $req = "SELECT * FROM reviews WHERE id_escapeGame = ?";
        $data = array($id);
        $reviewsEG = $this->execReqPrep($req, $data);
        return $reviewsEG;
    }

    public function getQandAEG($id)
    {
        $req = "SELECT * FROM qAndAQuestion WHERE id_qAndACat = ?";
        $data = array($id + 1);
        $qAndAEG = $this->execReqPrep($req, $data);
        return $qAndAEG;
    }


}