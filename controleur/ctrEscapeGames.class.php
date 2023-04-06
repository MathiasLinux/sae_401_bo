<?php

require_once "modele/escapeGame.class.php";
require_once "vue/vue.class.php";

class ctrEscapeGames
{
    public $escapeGames;
    public $escapeGame;
    public $ch;
    public $options;
    public $r;
    public $info;

    public function __construct()
    {
        $this->escapeGames = new escapeGame; 

        if(isset($_GET["escapeGame"])){
            $this->escapeGame = $this->escapeGames->getEscapeGame($_GET["escapeGame"]);

            if(($this->escapeGame["x"]==0) && ($this->escapeGame["y"]==0))
            {
                $this->ch = curl_init();

                $this->options = array(
                    CURLOPT_URL => "http://api.positionstack.com/v1/forward?access_key=8e1f3883571571dbaade3511a59d7e2b&query=". urlencode($this->escapeGame["address"]),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => true,
                );
                curl_setopt_array($this->ch, $this->options);

                $this->r = curl_exec($this->ch);

                $this->result = json_decode($this->r);

        

                // Verif des erreurs
                if(curl_errno($this->ch) === 0){
                    $this->result = json_decode($this->r);
                    $latitudeX = $this->result->data[0]->latitude;
                    $longitudeY = $this->result->data[0]->longitude;
                    $idEG = $_GET["escapeGame"];
                    $this->escapeGames->addXY($latitudeX, $longitudeY, $idEG);
                }
                else
                    throw new Exception("Coordonnées introuvables => (".curl_errno($this->ch).")". curl_error($this->r));
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
        
        if($_SESSION['lang'] == 'fr'){
            $mois = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
            $dateEscapeGame = $dateSplit[2] . " " . $mois[(int) $dateSplit[1]-1] . " " . $dateSplit[0];
        }
        else{
            $dateEscapeGame = $dateSplit[2] . " " . date('F', mktime(0, 0, 0, $dateSplit[1], 10)) . " " . $dateSplit[0];
        }
        
        if($_POST['hour']=='ten')
            $hourEscapeGame = 10;
        else if($_POST['hour']=='fourteen')
            $hourEscapeGame = 14;
        else if($_POST['hour']=="eightteen")
            $hourEscapeGame = 18;
        else if($_POST['hour']=="twenty")
            $hourEscapeGame = 20;
        $objVue = new vue("buyEG");
        $objVue->afficher(array("buyEG" => $_POST, "nameEscapeGame" => $nameEscapeGame, "priceEscapeGame" => $priceEscapeGame, "dateEscapeGame" => $dateEscapeGame, "hourEscapeGame" => $hourEscapeGame), $title);
    }

    public function buyEGValid()
    {
        var_dump($_POST);
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
                if (empty($error)) {
                    $id_user = $this->objUser->getIdUser($_SESSION['email']);
                    $this->objGiftCards->buyGiftCardsEscape($_POST['idEscapeGame'], $id_user);
                    header("Location: index.php?action=buyCardSuccess");
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
                    $objVue = new vue("BuyCards");
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
                $objVue = new vue("BuyCardsEscape");
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