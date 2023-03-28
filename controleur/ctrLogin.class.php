<?php

require_once "modele/login.class.php";
require_once "modele/user.class.php";
require_once "modele/giftCards.class.php";
require_once "vue/vue.class.php";

class ctrLogin
{
    private $objLogin;
    private $objUser;
    private $objGiftCards;

    /****************
     * Constructeur
     * Instancie les objets nécessaires au bon fonctionnement du contrôleur
     ***************/
    public function __construct()
    {
        $this->objLogin = new login();
        $this->objUser = new user();
        $this->objGiftCards = new giftCards();
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

    public function account()
    {
        $user = $this->objUser->getUserInfo($_SESSION["id"]);
        $moneyCards = $this->objGiftCards->getMoneyCardsUser($_SESSION["id"]);
        $escapeCards = $this->objGiftCards->getEscapeCardsUser($_SESSION["id"]);
        $reservation = $this->objUser->getReservationUser($_SESSION["id"]);
        $title = "My account - Kaiserstuhl escape";
        $objVue = new vue("Account");
        $objVue->afficher(array("user" => $user, "moneyCards" => $moneyCards, "escapeCards" => $escapeCards, "reservation" => $reservation), $title);
    }

    public function accountUpdateInfos()
    {
        //var_dump($_POST);
        $error = array();
        $user = $this->objUser->getUserInfo($_SESSION["id"]);
        if (isset($_POST["email"]) and isset($_POST["firstName"]) and isset($_POST["lastName"]) and isset($_POST["password"]) and isset($_POST["newPassword"]) and isset($_POST["newPasswordConfirm"])) {
            if (!empty($_POST["email"]) and $_POST["email"] != $_SESSION["email"]) { // Vérification de l'email
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { // Vérification que l'email est valide
                    if (!$this->objLogin->emailAlreadyUsed($_POST["email"])) { // Vérification que l'email n'est pas utilisé
                        $this->objUser->updateEmail($_SESSION["id"], $_POST["email"]); // Mise à jour de l'email
                        $_SESSION["email"] = $_POST["email"]; // Mise à jour de la variable de session
                    } else {
                        $error[] = 1; // L'email est déjà utilisé
                    }
                } else {
                    $error[] = 2; // L'email n'est pas valide
                }
            }
            if (!empty($_POST["firstName"]) and $_POST["firstName"] != $user["firstName"]) // Vérification du prénom
                if (preg_match("/^[a-zA-Z]+$/", $_POST["firstName"])) // Vérification que le prénom ne contient que des lettres
                    $this->objUser->updateFirstName($_SESSION["id"], $_POST["firstName"]); // Mise à jour du prénom
                else {
                    $error[] = 3; // Le prénom contient des caractères non autorisés
                }
            if (!empty($_POST["lastName"]) and $_POST["lastName"] != $user["lastName"]) { // Vérification du nom
                if (preg_match("/^[a-zA-Z]+$/", $_POST["lastName"])) // Vérification que le nom ne contient que des lettres
                    $this->objUser->updateLastName($_SESSION["id"], $_POST["lastName"]); // Mise à jour du nom
                else {
                    $error[] = 4; // Le nom contient des caractères non autorisés
                }
            }
            if (!empty($_POST["password"]) and !empty($_POST["newPassword"]) and !empty($_POST["newPasswordConfirm"])) { // Vérification des mots de passe
                if ($this->objLogin->compareLogin($_SESSION["email"], $_POST["password"])) { // Vérification que le mot de passe actuel est correct
                    if ($_POST["newPassword"] == $_POST["newPasswordConfirm"]) { // Vérification que les nouveaux mots de passe sont identiques
                        $this->objUser->updatePassword($_SESSION["id"], $_POST["newPassword"]); // Mise à jour du mot de passe
                    } else {
                        $error[] = 5; // Les nouveaux mots de passe ne sont pas identiques
                    }
                } else {
                    $error[] = 6; // Le mot de passe actuel est incorrect
                }
            }
        }
        if (count($error) > 0) { // Si il y a des erreurs
            $this->accountChangeInfos($error); // Redirection vers la page de modification des informations
        } else {
            header("Location: /index.php?action=account"); // Redirection vers la page de mon compte
        }
    }

    public function accountChangeInfos($error = array())
    {
        $user = $this->objUser->getUserInfo($_SESSION["id"]);
        $title = "My account - Kaiserstuhl escape";
        $objVue = new vue("AccountChangeInfos");
        $objVue->afficher(array("user" => $user, "error" => $error), $title);
    }

    public function logout()
    {
        session_destroy();
        setcookie("PHPSESSID", "", 0, "/");
        header("Location: index.php");
    }
}