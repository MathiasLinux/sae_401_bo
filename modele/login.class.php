<?php

/***********
 * Classe permettant de gérer les connexions
 ***********/

require_once "modele/bdd.class.php";

class login extends bdd
{

    /******
     * A function to check if the email is already used
     * @param $email string the email to check
     * @return bool
     */
    public function emailAlreadyUsed($email)
    {
        $req = "SELECT * FROM user WHERE email = ?"; // Envoie de la requête SQL

        $verif = $this->execReqPrep($req, array($email));

        if (empty($verif[0])) {
            return false; // Si l'email n'existe pas
        } else {
            return true; // Si l'email existe déjà
        }
    }

    /******
     * A function to check if the email and the password are correct
     * @param $login string the email to check
     * @param $password string the password to check
     * @return bool
     */
    public function compareLogin($login, $password)
    {
        $req = "SELECT * FROM user WHERE email = ?"; // Envoie de la requête SQL

        $verif = $this->execReqPrep($req, array($login));

        if (empty($verif[0])) {
            return false; // Si l'email n'existe pas
        } else {
            if ($verif[0]["email"] == $login && password_verify($password, $verif[0]["password"])) {
                return true; // Si l'email et le mot de passe sont corrects
            } else {
                return false; // Si l'email est correct mais que le mot de passe ne l'est pas
            }

        }
    }

    /*******
     * A function to add a user without admin rights
     * @param $email string the email of the user
     * @param $password string the password of the user (not hashed)
     * @param $firstName string the first name of the user
     * @param $lastName string the last name of the user
     * @return void
     * @throws Exception
     */
    public function addNormalUser($email, $password, $firstName, $lastName)
    {
        if (isset($email) and isset($password) and isset($firstName) and isset($lastName)) { // Vérifie que les variables existent
            $req = "INSERT INTO user (email, password, firstName, lastName, token) VALUES (?, ?, ?, ?, ?)"; // Envoie de la requête SQL
            $token = base64_encode(random_bytes(120)); // Génère un token aléatoire
            // Vérifie que le token n'est pas déjà utilisé
            while ($this->execReqPrep("SELECT * FROM user WHERE token = ?", array($token))) {
                $token = base64_encode(random_bytes(120)); // Génère un nouveau token
            }
            $this->execReqPrep($req, array($email, password_hash($password, PASSWORD_DEFAULT), $firstName, $lastName, $token)); // Exécute la requête
        }
    }

    /*******
     * A function to get the token of a user
     * @param $id int the id of the user
     * @return mixed
     */
    public function getToken($id)
    {
        $req = "SELECT token FROM user WHERE id_user = ?"; // Envoie de la requête SQL

        $token = $this->execReqPrep($req, array($id));

        return $token[0]["token"];
    }
}