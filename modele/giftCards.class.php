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
}