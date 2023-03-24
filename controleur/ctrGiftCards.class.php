<?php

require_once "modele/giftCards.class.php";
require_once "modele/escapeGame.class.php";
require_once "modele/card.class.php";
require_once "vue/vue.class.php";

class ctrGiftCards
{
    public $objGiftCards;
    public $objEscapeGame;
    public $objCard;

    public function __construct()
    {
        $this->objGiftCards = new giftCards();
        $this->objEscapeGame = new escapeGame();
        $this->objCard = new card();
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
                    $objVue = new vue("BuyCards");
                    $objVue->afficher(array("idEscapeGame" => $idEscapeGame, "persons" => $persons), $title);
                }
            }
        }
    }

    public function buyCardValid()
    {
        var_dump($_POST);
        if (isset($_POST['cardNumber']) and isset($_POST['cardDate']) and isset($_POST['cardCVC']) and isset($_POST['cardName']) and isset($_POST['amount'])) {
            if ($this->objCard->verifyCard($_POST['cardNumber'], $_POST['cardDate'], $_POST['cardCVC'], $_POST['cardName'])) {
            } else {
                echo "Card not valid";
            }
        }
    }
}