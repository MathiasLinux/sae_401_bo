<?php

/***********
 * Classe permettant de gérer les connexions
 ***********/

require_once "modele/bdd.class.php";

class login extends bdd
{

    //Fonction qui vérifie si l'email est déjà utilisé
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

    //Fonction qui vérifie si le login et le mot de passe sont corrects
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

    //Fonction qui ajoute un utilisateur normal
    public function addNormalUser($email, $password, $firstName, $lastName)
    {
        if (isset($email) and isset($password) and isset($firstName) and isset($lastName)) { // Vérifie que les variables existent
            $req = "INSERT INTO user (email, password, firstName, lastName) VALUES (?, ?, ?, ?)"; // Envoie de la requête SQL
            $this->execReqPrep($req, array($email, password_hash($password, PASSWORD_DEFAULT), $firstName, $lastName)); // Exécute la requête
        }
    }
}