<?php

require_once "vue/vue.class.php";

class card extends bdd
{
    public function verifyCard($cardNumber, $cardDate, $cardCVC, $cardName)
    {
        if ($this->verifyCardNumber($cardNumber) and $this->verifyCardCVC($cardCVC) and $this->verifyCardDate($cardDate) and $this->verifyCardName($cardName)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCardNumber($cardNumber)
    {
        //verify the card number with the lunh algorithm
        $cardNumber = strrev($cardNumber);
        $sum = 0;
        for ($i = 0; $i < strlen($cardNumber); $i++) {
            if ($i % 2 == 0) {
                $sum += $cardNumber[$i];
            } else {
                $sum += $cardNumber[$i] * 2;
            }
        }
        if ($sum % 10 == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCardCVC($cardCVC)
    {
        //verify the card cvc
        if (strlen($cardCVC) == 3 or strlen($cardCVC) == 4) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCardDate($cardDate)
    {
        //verify the card date
        $cardDate = explode("/", $cardDate);
        $cardDate = $cardDate[1] . $cardDate[0];
        $cardDate = intval($cardDate);
        $date = date("ym");
        $date = intval($date);
        if ($cardDate > $date) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyCardName($cardName)
    {
        //verify the card name
        if (strlen($cardName) > 0) {
            return true;
        } else {
            return false;
        }
    }

}