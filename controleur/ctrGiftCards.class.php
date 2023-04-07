<?php

require_once "modele/giftCards.class.php";
require_once "modele/escapeGame.class.php";
require_once "modele/card.class.php";
require_once "modele/user.class.php";
require_once "vue/vue.class.php";

class ctrGiftCards
{
    public $objGiftCards;
    public $objEscapeGame;
    public $objCard;
    public $objUser;

    public function __construct()
    {
        $this->objGiftCards = new giftCards();
        $this->objEscapeGame = new escapeGame();
        $this->objCard = new card();
        $this->objUser = new user();
    }

    public function giftCards()
    {
        $giftCardAmount = $this->objGiftCards->getGiftCardAmount();
        $escapeGames = $this->objEscapeGame->getEscapeGames();
        $title = "Gift Cards - Kaiserstuhl escape";
        $objVue = new vue("GiftCards");
        $objVue->afficher(array("giftCardAmount" => $giftCardAmount, "escapeGames" => $escapeGames), $title);
    }

    public function buyCard()
    {
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            if ($type == "money") {
                if (isset($_POST['moneyCardsAmount'])) {
                    $amount = $_POST['moneyCardsAmount'];
                    $title = "Payment - Kaiserstuhl escape";
                    $objVue = new vue("BuyCards");
                    $objVue->afficher(array("amount" => $amount), $title);
                }
            } elseif ($type == "escape") {
                if (isset($_POST['escapeCardsChoose']) && isset($_POST['persons'])) {
                    $idEscapeGame = $_POST['escapeCardsChoose'];
                    $persons = $_POST['persons'];
                    $title = "Payment - Kaiserstuhl escape";
                    $objVue = new vue("BuyCardsEscape");
                    if (!empty($idEscapeGame)) {
                        if ($_SESSION['lang'] == "fr") {
                            $nameEscapeGame = $this->objEscapeGame->getEscapeGame($idEscapeGame)["nameFR"];
                        } elseif ($_SESSION['lang'] == "en") {
                            $nameEscapeGame = $this->objEscapeGame->getEscapeGame($idEscapeGame)["name"];
                        } else {
                            $nameEscapeGame = $this->objEscapeGame->getEscapeGame($idEscapeGame)["name"];
                        }
                        $priceEscapeGame = $this->objEscapeGame->getPriceEscapeGame($idEscapeGame, $persons);
                    } else {
                        $nameEscapeGame = "";
                        $priceEscapeGame = "";
                    }
                    $objVue->afficher(array("idEscapeGame" => $idEscapeGame, "nameEscapeGame" => $nameEscapeGame, "persons" => $persons, "priceEscapeGame" => $priceEscapeGame), $title);
                }
            }
        }
    }

    public function buyCardValid()
    {
        //var_dump($_POST);
        if (isset($_POST['cardNumber']) and isset($_POST['cardDate']) and isset($_POST['cardCVC']) and isset($_POST['cardName']) and isset($_POST['amount'])) {
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
            if (empty($_POST['amount'])) {
                if ($_SESSION['lang'] == "fr") {
                    $error['amount'] = "Aucun montant n'a été choisi";
                } else {
                    $error['amount'] = "No amount has been chosen";
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
                    $this->objGiftCards->buyGiftCardsMoney($_POST['amount'], $id_user);
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
                $objVue = new vue("BuyCards");
                $objVue->afficher(array("error" => $error, "okValue" => $okValues, "amount" => $_POST['amount']), $title);
            }
        }

    }

    public function buyCardValidEscape()
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

    public function buyCardSuccess()
    {
        $title = "Payment - Kaiserstuhl escape";
        $objVue = new vue("BuyCardsSuccess");
        $objVue->afficher(array(), $title);
    }
}