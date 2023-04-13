<?php

require_once "modele/bdd.class.php";

class giftCards extends bdd
{
    /*******
     * A function to get all the gift cards amount that are not deleted
     * @return array|false
     */
    public function getGiftCardAmount()
    {
        $req = "SELECT * FROM giftCardAmount WHERE deleted = 0";
        $giftCardsAmount = $this->execReq($req);
        return $giftCardsAmount;
    }

    /*******
     * A function to get all the gift cards amount even the deleted ones
     * @return array|false
     */
    public function getAllGiftCardsAmount()
    {
        $req = "SELECT * FROM giftCardAmount";
        $giftCards = $this->execReq($req);
        return $giftCards;
    }

    /********
     * A function to add the deleted tag to a gift card amount
     * @param $id int the id of the gift card amount to delete
     * @return void
     */
    public function delGiftCardAmount($id)
    {
        //echo "id = " . $id;
        //$req = "DELETE FROM giftCardAmount WHERE id_giftCardAmount = ?";
        $req = "UPDATE giftCardAmount SET deleted = 1 WHERE id_giftCardAmount = ?";
        $this->execReqPrep($req, array($id));
    }

    /*******
     * A function to re add a gift card amount that where deleted
     * @param $id int the id of the gift card amount to re add
     * @return void
     */
    public function reAddGiftCardAmount($id)
    {
        $req = "UPDATE giftCardAmount SET deleted = 0 WHERE id_giftCardAmount = ?";
        $this->execReqPrep($req, array($id));
    }

    /*******
     * A function to let a user buy a gift card with a money amount
     * @param $amount int the amount of the gift card
     * @param $id_user int the id of the user that buy the gift card
     * @return void
     */
    public function buyGiftCardsMoney($amount, $id_user)
    {
        echo "amount = " . $amount . " id_user = " . $id_user;
        $id_giftCardAmount = $this->searchGiftCardAmount($amount)[0]["id_giftCardAmount"];
        echo "id_giftCardAmount = " . $id_giftCardAmount;
        $req = "INSERT INTO giftCard (buyingDate, type, code, id_giftCardAmount, id_user) VALUES (?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), "money", $this->generateCode(), $id_giftCardAmount, $id_user));
    }

    /********
     * A function to search a gift card amount by its price
     * @param $price int the price of the gift card amount
     * @return array|false|int
     */
    public function searchGiftCardAmount($price)
    {
        $req = "SELECT id_giftCardAmount FROM giftCardAmount WHERE price = ?";
        return $this->execReqPrep($req, array($price));
    }

    /********
     * A function to generate a random code for a gift card (13 digits)
     * @return string the code of the gift card
     */
    public function generateCode()
    {
        $code = "";
        for ($i = 0; $i < 13; $i++) {
            $code .= rand(0, 9);
        }

        while ($this->execReqPrep("SELECT * FROM giftCard WHERE code = ?", array($code))) {
            $code = "";
            for ($i = 0; $i < 13; $i++) {
                $code .= rand(0, 9);
            }
        }
        return $code;
    }

    /*********
     * A function to let a user buy a gift card with an escape game
     * @param $id_escapeGame int the id of the escape game
     * @param $id_user int the id of the user that buy the gift card
     * @return void
     */
    public function buyGiftCardsEscape($id_escapeGame, $id_user)
    {
        echo "id_escapeGame = " . $id_escapeGame . " id_user = " . $id_user;
        $req = "INSERT INTO giftCard (buyingDate, type, code, id_escapeGame, id_user) VALUES (?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), "escapeGame", $this->generateCode(), $id_escapeGame, $id_user));
    }

    /********
     * A function to add an amount to the gift card amount table
     * @return array|false
     */
    public function addGiftCardAmount($amount)
    {
        $req = "INSERT INTO giftCardAmount (price) VALUES (?)";
        if ($this->execReqPrep($req, array($amount)))
            return true;
        else
            return false;
    }

    /******
     * A function to get all the money gift cards
     * @return array|false
     */
    public function getMoneyCards()
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, DATE_FORMAT(usageDate, '%d/%m/%Y') AS usageDate, gCA.price, u.firstName, u.lastName, u.email FROM giftCard INNER JOIN giftCardAmount gCA on giftCard.id_giftCardAmount = gCA.id_giftCardAmount INNER JOIN user u on giftCard.id_user = u.id_user WHERE type = 'money';";
        return $this->execReq($req);
    }

    /*******
     * A function to get all the escape game gift cards
     * @return array|false
     */
    public function getEscapeCards()
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, DATE_FORMAT(usageDate, '%d/%m/%Y') AS usageDate, eG.name, u.firstName, u.lastName, u.email FROM giftCard INNER JOIN user u on giftCard.id_user = u.id_user INNER JOIN escapeGame eG on giftCard.id_escapeGame = eG.id_escapeGame WHERE type = 'escapeGame';";
        return $this->execReq($req);
    }

    /*********
     * A function to get all the money gift cards of a user
     * @param $id int the id of the user
     * @return array|false|int
     */
    public function getMoneyCardsUser($id)
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, gCA.price FROM giftCard INNER JOIN giftCardAmount gCA on giftCard.id_giftCardAmount = gCA.id_giftCardAmount WHERE type = 'money' AND giftCard.id_user = ? AND ISNULL(usageDate);";
        return $this->execReqPrep($req, array($id));
    }

    /*********
     * A function to get all the escape game gift cards of a user
     * @param $id int the id of the user
     * @return array|false|int
     */
    public function getEscapeCardsUser($id)
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, eG.name, eG.nameFR FROM giftCard INNER JOIN escapeGame eG on giftCard.id_escapeGame = eG.id_escapeGame WHERE type = 'escapeGame' AND giftCard.id_user = ? AND ISNULL(usageDate);";
        return $this->execReqPrep($req, array($id));
    }

    /*********
     * A function to verify if a gift card exists and if it is not used
     * @param $code string the code of the gift card
     * @return bool
     */
    public function verifyGiftCard($code)
    {
        $req = "SELECT * FROM giftCard WHERE code = ? AND ISNULL(usageDate);";
        if ($this->execReqPrep($req, array($code)))
            return true;
        else
            return false;
    }

    /*********
     * A function to verify if a gift card exists and if it is not used
     * @param $code string the code of the gift card
     * @return void
     */
    public function userUsedGiftCard($code)
    {
        $req = "UPDATE giftCard SET usageDate = ? WHERE code = ?;";
        $this->execReqPrep($req, array(date("Y-m-d"), $code));
    }

    /*********
     * A function to get the amount of a gift card
     * @param $code string the code of the gift card
     * @return array|false|int
     */
    public function getDiscount($code)
    {
        $req = "SELECT price FROM giftCardAmount INNER JOIN giftCard on giftCard.id_giftCardAmount = giftCardAmount.id_giftCardAmount WHERE code = ?;";
        return $this->execReqPrep($req, array($code));
    }

    /*********
     * A function to verify if the amount of the order is greater than the amount of the gift card
     * @param $giftCardNumber string the code of the gift card
     * @param $orderAmount string the amount of the order
     * @return bool
     */
    public function verifyGiftCardAmount($giftCardNumber, $orderAmount)
    {
        $req = "SELECT price FROM giftCardAmount INNER JOIN giftCard on giftCard.id_giftCardAmount = giftCardAmount.id_giftCardAmount WHERE code = ?;";
        $giftCardAmount = $this->execReqPrep($req, array($giftCardNumber));
        //if the orderAmount is a float number use floatval($orderAmount) else use intval($orderAmount)
        if (str_contains($orderAmount, ".")) {
            if (floatval($orderAmount) >= floatval($giftCardAmount[0]["price"]))
                return true;
            else
                return false;
        } else {
            if (intval($orderAmount) >= intval($giftCardAmount[0]["price"]))
                return true;
            else
                return false;
        }
    }
}