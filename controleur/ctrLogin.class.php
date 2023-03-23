<?php

require_once "modele/login.class.php";
require_once "modele/user.class.php";
require_once "vue/vue.class.php";

class ctrLogin
{
    private $objLogin;
    private $objUser;

    /****************
     * Constructeur
     * Instancie les objets nécessaires au bon fonctionnement du contrôleur
     ***************/
    public function __construct()
    {
        $this->objLogin = new login();
        $this->objUser = new user();
    }

    /****************
     * Fonction qui affiche la page de connexion
     ***************/
    public function login()
    {
        $title = "Connexion - Kaiserstuhl escape";
        $objVue = new vue("Login");
        $objVue->afficher(array(), $title);
    }

    /****************
     * Fonction qui affiche la page d'inscription
     ***************/
    public function signUp()
    {
        $title = "Sign up - Kaiserstuhl escape";
        $objVue = new vue("SignUp");
        $objVue->afficher(array(), $title);
    }

    /****************
     * Fonction qui crée un compte
     ***************/
    public function createAccount()
    {
        // Vérification des données
        if (isset($_POST["email"]) and isset($_POST["password"]) and isset($_POST["password1"]) and isset($_POST["firstName"]) and isset($_POST["lastName"])) {
            if (!empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["password1"]) and !empty($_POST["firstName"]) and !empty($_POST["lastName"])) {
                // Vérification de l'email
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    // Vérification que l'email n'est pas déjà utilisé
                    if (!$this->objLogin->emailAlreadyUsed($_POST["email"])) {
                        // Vérification que le nom et le prénom ne contiennent que des lettres
                        if (preg_match("/^[a-zA-Z]+$/", $_POST["firstName"]) and preg_match("/^[a-zA-Z]+$/", $_POST["lastName"])) {
                            // Vérification que les mots de passe sont identiques
                            if ($_POST["password"] == $_POST["password1"]) {
                                // Ajout de l'utilisateur
                                $this->objLogin->addNormalUser($_POST["email"], $_POST["password"], $_POST["firstName"], $_POST["lastName"]);
                                // Connexion de l'utilisateur
                                header("Location: index.php?action=login");
                            } else {
                                // Les mots de passe ne sont pas identiques
                                header("Location: index.php?action=signUp&error=1");
                            }
                        } else {
                            // Le nom ou le prénom contient des caractères non autorisés
                            header("Location: index.php?action=signUp&error=4");
                        }
                    } else {
                        // L'email est déjà utilisé
                        header("Location: index.php?action=signUp&error=5");
                    }
                } else {
                    // L'email n'est pas valide
                    header("Location: index.php?action=signUp&error=2");
                }
            } else {
                // Un des champs est vide
                header("Location: index.php?action=signUp&error=3");
            }
        }
    }

    /****************
     * Fonction qui connecte un utilisateur
     ***************/
    public function connexion()
    {
        // Vérification des données
        if (isset($_POST["email"]) and isset($_POST["password"])) {
            // Vérification que l'email et le mot de passe sont corrects
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                if ($this->objLogin->compareLogin($_POST["email"], $_POST["password"])) {
                    // Création des variables de session
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION["id"] = $this->objUser->getIdUser($_POST["email"]);
                    $_SESSION["rights"] = $this->objUser->getUserRole($_SESSION["id"]);
                    // Redirection vers la page d'accueil
                    header("Location: index.php");
                } else {
                    // Redirection vers la page de connexion
                    header("Location: index.php?action=login&error=1");
                }
            } else {
                // Redirection vers la page de connexion
                header("Location: index.php?action=login&error=1");
            }
        } else {
            // Redirection vers la page de connexion
            header("Location: index.php?action=login&error=1");
        }
    }
}