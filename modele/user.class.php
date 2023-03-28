<?php

require_once "modele/bdd.class.php";

class user extends bdd
{
    public function getUsers()
    {
        $req = "SELECT id_user, email, firstName, lastName, rights FROM user";
        $users = $this->execReq($req);
        return $users;
    }

    public function getUserInfo($id)
    {
        $req = "SELECT email, firstName, lastName, rights FROM user WHERE id_user = ?";
        $user = $this->execReqPrep($req, array($id));
        return $user[0];
    }

    public function delUser($id)
    {
        $req = "DELETE FROM user WHERE id_user = ?";
        $this->execReqPrep($req, array($id));
    }

    public function updateRightsUser($id, $rights)
    {
        $req = "UPDATE user SET rights = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($rights, $id));
    }

    public function getUserRole($id)
    {
        $req = "SELECT rights FROM user WHERE id_user = ?";
        $user = $this->execReqPrep($req, array($id));
        return $user[0]["rights"];
    }

    public function getIdUser($email)
    {
        $req = "SELECT id_user FROM user WHERE email = ?";
        $user = $this->execReqPrep($req, array($email));
        return $user[0]["id_user"];
    }

    public function getReservationUser($id)
    {
        $req = "SELECT eG.name, eG.nameFR, DATE_FORMAT(gameDate, '%d/%m/%Y') AS gameDateDisplay, nbPlayers, buyersFirstName, buyersLastName FROM buying INNER JOIN escapeGame eG on buying.id_escapeGame = eG.id_escapeGame WHERE id_user = ? AND gameDate > CURDATE();";
        return $this->execReqPrep($req, array($id));
    }

    public function updateEmail($id, $email)
    {
        $req = "UPDATE user SET email = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($email, $id));
    }

    public function updateFirstName($id, $firstName)
    {
        $req = "UPDATE user SET firstName = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($firstName, $id));
    }

    public function updateLastName($id, $lastName)
    {
        $req = "UPDATE user SET lastName = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($lastName, $id));
    }

    public function updatePassword($id, $password)
    {
        $req = "UPDATE user SET password = ? WHERE id_user = ?";
        $this->execReqPrep($req, array(password_hash($password, PASSWORD_DEFAULT), $id));
    }
}