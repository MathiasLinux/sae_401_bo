<?php

require_once "modele/bdd.class.php";

class giftCards extends bdd
{
    public function getGiftCardAmount()
    {
        $req = "SELECT * FROM giftCardAmount WHERE deleted = 0";
        $giftCardsAmount = $this->execReq($req);
        return $giftCardsAmount;
    }

    public function getAllGiftCardsAmount()
    {
        $req = "SELECT * FROM giftCardAmount";
        $giftCards = $this->execReq($req);
        return $giftCards;
    }

    public function delGiftCardAmount($id)
    {
        //echo "id = " . $id;
        //$req = "DELETE FROM giftCardAmount WHERE id_giftCardAmount = ?";
        $req = "UPDATE giftCardAmount SET deleted = 1 WHERE id_giftCardAmount = ?";
        $this->execReqPrep($req, array($id));
    }

    public function reAddGiftCardAmount($id)
    {
        $req = "UPDATE giftCardAmount SET deleted = 0 WHERE id_giftCardAmount = ?";
        $this->execReqPrep($req, array($id));
    }

    public function buyGiftCardsMoney($amount, $id_user)
    {
        echo "amount = " . $amount . " id_user = " . $id_user;
        $id_giftCardAmount = $this->searchGiftCardAmount($amount)[0]["id_giftCardAmount"];
        echo "id_giftCardAmount = " . $id_giftCardAmount;
        $req = "INSERT INTO giftCard (buyingDate, type, code, id_giftCardAmount, id_user) VALUES (?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), "money", $this->generateCode(), $id_giftCardAmount, $id_user));
    }

    public function searchGiftCardAmount($price)
    {
        $req = "SELECT id_giftCardAmount FROM giftCardAmount WHERE price = ?";
        return $this->execReqPrep($req, array($price));
    }

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

    public function buyGiftCardsEscape($id_escapeGame, $id_user)
    {
        echo "id_escapeGame = " . $id_escapeGame . " id_user = " . $id_user;
        $req = "INSERT INTO giftCard (buyingDate, type, code, id_escapeGame, id_user) VALUES (?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), "escapeGame", $this->generateCode(), $id_escapeGame, $id_user));
    }

    public function addGiftCardAmount($amount)
    {
        $req = "INSERT INTO giftCardAmount (price) VALUES (?)";
        if ($this->execReqPrep($req, array($amount)))
            return true;
        else
            return false;
    }

    public function getMoneyCards()
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, DATE_FORMAT(usageDate, '%d/%m/%Y') AS usageDate, gCA.price, u.firstName, u.lastName, u.email FROM giftCard INNER JOIN giftCardAmount gCA on giftCard.id_giftCardAmount = gCA.id_giftCardAmount INNER JOIN user u on giftCard.id_user = u.id_user WHERE type = 'money';";
        return $this->execReq($req);
    }

    public function getEscapeCards()
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, DATE_FORMAT(usageDate, '%d/%m/%Y') AS usageDate, eG.name, u.firstName, u.lastName, u.email FROM giftCard INNER JOIN user u on giftCard.id_user = u.id_user INNER JOIN escapeGame eG on giftCard.id_escapeGame = eG.id_escapeGame WHERE type = 'escapeGame';";
        return $this->execReq($req);
    }

    public function getMoneyCardsUser($id)
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, gCA.price FROM giftCard INNER JOIN giftCardAmount gCA on giftCard.id_giftCardAmount = gCA.id_giftCardAmount WHERE type = 'money' AND giftCard.id_user = ? AND ISNULL(usageDate);";
        return $this->execReqPrep($req, array($id));
    }

    public function getEscapeCardsUser($id)
    {
        $req = "SELECT DATE_FORMAT(buyingDate, '%d/%m/%Y') AS buyingDate, code, eG.name, eG.nameFR FROM giftCard INNER JOIN escapeGame eG on giftCard.id_escapeGame = eG.id_escapeGame WHERE type = 'escapeGame' AND giftCard.id_user = ? AND ISNULL(usageDate);";
        return $this->execReqPrep($req, array($id));
    }
}