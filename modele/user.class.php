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
}