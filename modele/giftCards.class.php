<?php

require_once "modele/bdd.class.php";

class giftCards extends bdd
{
    public function getGiftCardAmount()
    {
        $req = "SELECT * FROM giftCardAmount";
        $giftCardsAmount = $this->execReq($req);
        return $giftCardsAmount;
    }

    public function delGiftCardAmount($id)
    {
        echo "id = " . $id;
        $req = "DELETE FROM giftCardAmount WHERE id_giftCardAmount = ?";
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
        return $code;
    }

    public function buyGiftCardsEscape($id_escapeGame, $id_user)
    {
        echo "id_escapeGame = " . $id_escapeGame . " id_user = " . $id_user;
        $req = "INSERT INTO giftCard (buyingDate, type, code, id_escapeGame, id_user) VALUES (?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array(date("Y-m-d"), "escapeGame", $this->generateCode(), $id_escapeGame, $id_user));
    }
}