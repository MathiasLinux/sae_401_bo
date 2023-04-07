<?php

require_once "modele/escapeGame.class.php";
require_once "modele/card.class.php";
require_once "modele/user.class.php";
require_once "vue/vue.class.php";

class ctrEscapeGames
{
    public $escapeGames;
    public $escapeGame;
    public $ch;
    public $options;
    public $r;
    public $info;

    public $objCard;
    public $objUser;

    public function __construct()
    {
        $this->escapeGames = new escapeGame();
        $this->objCard = new card();
        $this->objUser = new user();

        if (isset($_GET["escapeGame"])) {
            $this->escapeGame = $this->escapeGames->getEscapeGame($_GET["escapeGame"]);

            if (($this->escapeGame["x"] == 0) && ($this->escapeGame["y"] == 0)) {
                $this->ch = curl_init();

                // User agent to be viewed as the user agent of the browser that is making the request
                $config['useragent'] = $_SERVER['HTTP_USER_AGENT'];

                $this->options = array(
                    //https://nominatim.openstreetmap.org/search?format=json&q={address}
                    CURLOPT_URL => "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($this->escapeGame["address"]),
                    CURLOPT_USERAGENT => $config['useragent'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => true,
                );
                curl_setopt_array($this->ch, $this->options);

                $this->r = curl_exec($this->ch);

                $this->result = json_decode($this->r);

                // Verif des erreurs
                if (curl_errno($this->ch) === 0) {
                    $this->result = json_decode($this->r);
                    $latitudeX = $this->result[0]->lat;
                    $longitudeY = $this->result[0]->lon;
                    $idEG = $_GET["escapeGame"];
                    $this->escapeGames->addXY($latitudeX, $longitudeY, $idEG);
                } else
                    throw new Exception("Coordonnées introuvables => (" . curl_errno($this->ch) . ")" . curl_error($this->ch));
            }
        }
    }

    public function escapeGames()
    {
        $escapeGames = $this->escapeGames->getEscapeGames();
        $title = "Escape Games - Kaiserstuhl escape";
        $objVue = new vue("EscapeGames");
        $objVue->afficher(array("escapeGames" => $escapeGames), $title);
    }

    public function escapeGame()
    {
        $reviewsEG = $this->escapeGames->getReviewEG($_GET["escapeGame"]);
        $qAndAEG = $this->escapeGames->getQAndAEG($_GET["escapeGame"]);
        $escapeGame = $this->escapeGames->getEscapeGame($_GET["escapeGame"]);
        $title = "Escape Game - Kaiserstuhl escape";
        $objVue = new vue("EscapeGame");
        $objVue->afficher(array("escapeGame" => $escapeGame, "reviewsEG" => $reviewsEG, "qAndAEG" => $qAndAEG), $title);
    }

    public function buyEG()
    {
        $title = "Escape Game - Payment";
        $escapeGame = $this->escapeGames->getEscapeGame($_GET["escapeGame"]);
        $nameEscapeGame = $escapeGame['name'];
        $priceEscapeGame = $this->escapeGames->getPriceEscapeGame($escapeGame["id_escapeGame"], $_POST["nbPersons"]);
        $dateSplit = preg_split("/[-]/", $_POST['buyDate']);

        if ($_SESSION['lang'] == 'fr') {
            $mois = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
            $dateEscapeGame = $dateSplit[2] . " " . $mois[(int)$dateSplit[1] - 1] . " " . $dateSplit[0];
        } else {
            $dateEscapeGame = $dateSplit[2] . " " . date('F', mktime(0, 0, 0, $dateSplit[1], 10)) . " " . $dateSplit[0];
        }

        if ($_POST['hour'] == 'ten')
            $hourEscapeGame = 10;
        else if ($_POST['hour'] == 'fourteen')
            $hourEscapeGame = 14;
        else if ($_POST['hour'] == "eightteen")
            $hourEscapeGame = 18;
        else if ($_POST['hour'] == "twenty")
            $hourEscapeGame = 20;
        $objVue = new vue("BuyEG");
        $objVue->afficher(array("nameEscapeGame" => $nameEscapeGame, "priceEscapeGame" => $priceEscapeGame, "dateEscapeGame" => $dateEscapeGame, "hourEscapeGame" => $hourEscapeGame), $title);
    }

    public function buyEGValid()
    {
        if (isset($_POST['cardNumber']) and isset($_POST['cardDate']) and isset($_POST['cardCVC']) and isset($_POST['cardName']) and isset($_POST['amount']) and isset($_POST['idEscapeGame'])) {
            $error = [];
            if (empty($_POST['cardNumber'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['cardNumber'] = "Le numéro de la carte est vide";
                } else {
                    $error['cardNumber'] = "Card number is empty";
                }
            }
            if (empty($_POST['cardDate'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['cardDate'] = "La date de la carte est vide";
                } else {
                    $error['cardDate'] = "Card date is empty";
                }
            }
            if (empty($_POST['cardCVC'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['cardCVC'] = "Le CVC de la carte est vide";
                } else {
                    $error['cardCVC'] = "Card CVC is empty";
                }
            }
            if (empty($_POST['cardName'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['cardName'] = "Le nom de la carte est vide";
                } else {
                    $error['cardName'] = "Card name is empty";
                }
            }
            if (empty($_POST['idEscapeGame'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['idEscapeGame'] = "Aucun escape game n'a été choisie";
                } else {
                    $error['idEscapeGame'] = "No escape game has been chosen";
                }
            }
            if (empty($_POST['buyerFirstName'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['buyerFirstName'] = "Le prénom est vide";
                } else {
                    $error['buyerFirstName'] = "The first name is empty";
                }
            }
            if (empty($_POST['buyerLastName'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['buyerLastName'] = "Le nom est vide";
                } else {
                    $error['buyerLastName'] = "The last name is empty";
                }
            }
            if (empty($error)) {
                if (!$this->objCard->luhn_check($_POST['cardNumber'])) {
                    if ($_SESSION['lang'] == "fr") {
                        $error['cardNumber'] = "Le numéro de la carte n'est pas valide";
                    } else {
                        $error['cardNumber'] = "Card number is not valid";
                    }
                }

                if (!$this->objCard->verifyCardDate($_POST['cardDate'])) {
                    if ($_SESSION['lang'] == "fr") {
                        $error['cardDate'] = "La date de la carte n'est pas valide";
                    } else {
                        $error['cardDate'] = "Card date is not valid";
                    }
                }
                if (!$this->objCard->verifyCardCVC($_POST['cardCVC'])) {
                    if ($_SESSION['lang'] == "fr") {
                        $error['cardCVC'] = "Le CVC de la carte n'est pas valide";
                    } else {
                        $error['cardCVC'] = "Card CVC is not valid";
                    }
                }
                if (!$this->objCard->verifyCardName($_POST['cardName'])) {
                    if ($_SESSION['lang'] == "fr") {
                        $error['cardName'] = "Le nom de la carte n'est pas valide";
                    } else {
                        $error['cardName'] = "Card name is not valid";
                    }
                }
                if (!$this->objCard->verifyCardName($_POST['buyerFirstName'])) {
                    if ($_SESSION['lang'] == "fr") {
                        $error['buyerFirstName'] = "Le prénom n'est pas valide";
                    } else {
                        $error['buyerFirstName'] = "The first name is not valid";
                    }
                }
                if (!$this->objCard->verifyCardName($_POST['buyerLastName'])) {
                    if ($_SESSION['lang'] == "fr") {
                        $error['buyerLastName'] = "Le nom n'est pas valide";
                    } else {
                        $error['buyerLastName'] = "The last name is not valid";
                    }
                }

                if (empty($error)) {
                    $id_user = $this->objUser->getIdUser($_SESSION['email']);
                    $id_escapeGame = $_POST['idEscapeGame'];
                    //get the actual date with the format of the database
                    $buyingDate = date("Y-m-d");
                    $gameDate = $_POST['dateEscapeGame'];
                    $gameHour = $_POST['hourEscapeGame'];
                    $nbPersons = $_POST['nbPersons'];
                    $buyersFirstName = $_POST['buyerFirstName'];
                    $buyersLastName = $_POST['buyerLastName'];

                    //if date in french like 26 mai 2019 change it to 2019-05-26
                    if (preg_match("#[a-zA-Z]#", $gameDate)) {
                        $gameDate = $this->objCard->changeDateFR($gameDate);
                    }
                    //Change the date to a format like 2019-05-26 with strtotime
                    $gameDate = date("Y-m-d", strtotime($gameDate));
                    $this->escapeGames->buyEscapeGame($id_user, $id_escapeGame, $buyingDate, $gameDate, $gameHour, $nbPersons, $buyersFirstName, $buyersLastName);
                    header("Location: index.php?action=buyEGSuccess");
                } else {
                    // return to payment page with errors and send the post data of the values and the valid fields
                    $okValues = [];
                    //search if the values are in error
                    foreach ($_POST as $key => $value) {
                        if (!array_key_exists($key, $error)) {
                            $okValues[$key] = $value;
                        }
                    }
                    $title = "Payment - Kaiserstuhl escape";
                    $objVue = new vue("BuyEG");
                    $objVue->afficher(array("error" => $error, "okValue" => $okValues, "amount" => $_POST['amount']), $title);
                }
            } else {
                // return to payment page with errors and send the post data of the values and the valid fields
                if (!isset($okValues)) {
                    $okValues = [];
                }
                //search if the values are in error
                foreach ($_POST as $key => $value) {
                    if (!array_key_exists($key, $error)) {
                        $okValues[$key] = $value;
                    }
                }
                $title = "Payment - Kaiserstuhl escape";
                $objVue = new vue("BuyEG");
                //(array("nameEscapeGame" => $nameEscapeGame, "priceEscapeGame" => $priceEscapeGame, "dateEscapeGame" => $dateEscapeGame, "hourEscapeGame" => $hourEscapeGame)
                $objVue->afficher(array("error" => $error, "okValue" => $okValues, "amount" => $_POST['amount']), $title);
            }
        }
    }

    public function buyEGSuccess()
    {
        $title = "Payment - Kaiserstuhl escape";
        $objVue = new vue("BuyEGSuccess");
        $objVue->afficher(array(), $title);
    }
}