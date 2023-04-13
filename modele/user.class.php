<?php

require_once "modele/bdd.class.php";

class user extends bdd
{
    /*******
     * A function to get all the users
     * @return array|false
     */
    public function getUsers()
    {
        $req = "SELECT id_user, email, firstName, lastName, rights FROM user";
        $users = $this->execReq($req);
        return $users;
    }

    /*******
     * A function to get the user info from an id
     * @param $id int the id of the user
     * @return array|false
     */
    public function getUserInfo($id)
    {
        $req = "SELECT email, firstName, lastName, rights FROM user WHERE id_user = ?";
        $user = $this->execReqPrep($req, array($id));
        return $user[0];
    }

    /******
     * A function to delete a user
     * @param $id int the id of the user
     * @return void
     */
    public function delUser($id)
    {
        $req = "DELETE FROM user WHERE id_user = ?";
        $this->execReqPrep($req, array($id));
    }

    /*******
     * A function to update the rights of a user
     * @param $id int the id of the user
     * @param $rights string the new rights of the user
     * @return void
     */
    public function updateRightsUser($id, $rights)
    {
        $req = "UPDATE user SET rights = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($rights, $id));
    }

    /********
     * A function to get the rights of a user
     * @param $id int the id of the user
     * @return mixed
     */
    public function getUserRole($id)
    {
        $req = "SELECT rights FROM user WHERE id_user = ?";
        $user = $this->execReqPrep($req, array($id));
        return $user[0]["rights"];
    }

    /*******
     * A function to get the id of a user from his email
     * @param $email string the email of the user
     * @return mixed
     */
    public function getIdUser($email)
    {
        $req = "SELECT id_user FROM user WHERE email = ?";
        $user = $this->execReqPrep($req, array($email));
        return $user[0]["id_user"];
    }

    /********
     * A function to get the id of a user from his token
     * @param $token string the token of the user
     * @return mixed
     */
    public function getIdUserFromToken($token)
    {
        $req = "SELECT id_user FROM user WHERE token = ?";
        $user = $this->execReqPrep($req, array($token));
        return $user[0]["id_user"];
    }

    /*******
     * A function to get the email of a user from his id
     * @param $id int the id of the user
     * @return mixed
     */
    public function getUserEmail($id)
    {
        $req = "SELECT email FROM user WHERE id_user = ?";
        $user = $this->execReqPrep($req, array($id));
        return $user[0]["email"];
    }

    /*******
     * A function to get the reservations of a user from his id
     * @param $id int the id of the user
     * @return array|false|int
     */
    public function getReservationUser($id)
    {
        $req = "SELECT eG.name, eG.nameFR, DATE_FORMAT(gameDate, '%d/%m/%Y') AS gameDateDisplay, nbPlayers, buyersFirstName, buyersLastName FROM buying INNER JOIN escapeGame eG on buying.id_escapeGame = eG.id_escapeGame WHERE id_user = ? AND gameDate > CURDATE();";
        return $this->execReqPrep($req, array($id));
    }

    /********
     * A function to update the email of a user
     * @param $id int the id of the user
     * @param $email string the new email of the user
     * @return void
     */
    public function updateEmail($id, $email)
    {
        $req = "UPDATE user SET email = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($email, $id));
    }

    /*******
     * A function to update the first name of a user
     * @param $id int the id of the user
     * @param $firstName string the new first name of the user
     * @return void
     */
    public function updateFirstName($id, $firstName)
    {
        $req = "UPDATE user SET firstName = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($firstName, $id));
    }

    /*********
     * A function to update the last name of a user
     * @param $id int the id of the user
     * @param $lastName string the new last name of the user
     * @return void
     */
    public function updateLastName($id, $lastName)
    {
        $req = "UPDATE user SET lastName = ? WHERE id_user = ?";
        $this->execReqPrep($req, array($lastName, $id));
    }

    /*******
     * A function to update the password of a user
     * @param $id int the id of the user
     * @param $password string the new password of the user
     * @return void
     */

    public function updatePassword($id, $password)
    {
        $req = "UPDATE user SET password = ? WHERE id_user = ?";
        $this->execReqPrep($req, array(password_hash($password, PASSWORD_DEFAULT), $id));
    }
}