<?php

/*********************************************************
 * Classe permettant la communication avec la base de données
 *********************************************************/
abstract class bdd
{

    // Objet permettant la connexion à la BDD
    private $bdd;

    /*******************************************************
     * Execution d'une requête simple
     * Entrée :
     * req [string] : Requête SQL
     *
     * Retour :
     * [array] : Tableau associatif contenant le résultat de la requête
     *******************************************************/
    protected function execReq($req)
    {
        $reponse = $this->connexionBDD()->query($req);
        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    /*******************************************************
     * Connexion à la BDD à partir des paramètres de configuration
     * Entrée :
     *
     * Retour :
     * [object] : Objet de type PDO
     *******************************************************/
    private function connexionBDD()
    {
        global $conf;   // Récupération des paramètres de configuration
        if (!isset($this->bdd))     // Si la connexion à la BDD n'est pas encore établie
            try {  // Connexion à la base de données et initialisation de la propriété bdd
                $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->bdd = new PDO('mysql:host=' . $conf->DBHOST . ';dbname=' . $conf->DBNAME, $conf->DBUSER, $conf->DBPWD, $options);
            } catch (Exception $err) {   // Erreur lors de la connexion à la BDD
                throw new Exception("Connexion à la BDD"); //.$err->getMessage());
            }

        return $this->bdd;
    }

    /*******************************************************
     * Execution d'une requête préparée
     * Entrée :
     * req [string] : Requête préparée
     * data [array] : Tableau contenant les données utilisées par la requête préparée
     *
     * Retour :
     * [array] : Tableau associatif contenant le résultat de la requête
     *******************************************************/
    protected function execReqPrep($req, $data)
    {
        $reponse = $this->connexionBDD()->prepare($req);
        if ($reponse->execute($data)) {
            $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($resultat))
                return $resultat;   // Résultat de la requête dans un tab. assoc.
            else
                return $reponse->rowCount();    // Nombre de lignes modifiées par la requête
        }
        return FALSE;   // Erreur lors de l'exécution de la requête
    }
}