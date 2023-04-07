<?php

require_once "vue/vue.class.php";

class card extends bdd
{
    /*******
     *  Luhn algorithm number checker - (c) 2005-2008 shaman - www.planzero.org *
     * This code has been released into the public domain, however please
     * give credit to the original author where possible.
     * @param $number string the card number to verify
     * @return bool
     */

    function luhn_check($number)
    {

        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $number = preg_replace('/\D/', '', $number);

        // Set the string length and parity
        $number_length = strlen($number);
        $parity = $number_length % 2;

        // Loop through each digit and do the maths
        $total = 0;
        for ($i = 0; $i < $number_length; $i++) {
            $digit = $number[$i];
            // Multiply alternate digits by two
            if ($i % 2 == $parity) {
                $digit *= 2;
                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            // Total up the digits
            $total += $digit;
        }

        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? TRUE : FALSE;

    }

    /*****
     * A function to verify the card CVC number (3 or 4 digits) is valid
     * @param $cardCVC string the card cvc number to verify (3 or 4 digits)
     * @return bool
     */

    public function verifyCardCVC($cardCVC)
    {
        //verify the card cvc
        if (strlen($cardCVC) == 3 or strlen($cardCVC) == 4) {
            return true;
        } else {
            return false;
        }
    }


    /********
     * A function to verify the card date is valid
     * @param $cardDate string the card date to verify (mm/yy) or (mm/yyyy)
     * @return bool
     */
    public function verifyCardDate($cardDate)
    {
        //var_dump($cardDate);
        if (strlen($cardDate) != 5 and strlen($cardDate) != 7) {
            return false;
        }
        //if card doesn't have a slash in it return false
        if (!str_contains($cardDate, "/")) {
            return false;
        }
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

    /********
     * A function to verify the card name is valid
     * @param $cardName string the card name to verify (only letters) and length superior to 2 and can contain a space and a dash (-) and a apostrophe (') and a dot (.)
     * @return bool
     */
    public function verifyCardName($cardName)
    {
        //verify the card name (only letters) and length superior to 2 and can contain a space and a dash (-) and a apostrophe (') and a dot (.)
        if (preg_match("/^[a-zA-ZÀ-ÿ '-.]{2,}$/", $cardName)) {
            return true;
        } else {
            return false;
        }
    }

    /********
     * A function to change the date format from FR to EN (ex: 14 avril 2021 to 14 April 2021)
     * @param $date string the date to change
     * @return string the date changed to EN format (ex: 14 April 2021)
     */
    public function changeDateFR($date)
    {
        //if the date contain a French month like "juin" or "juillet" change it to english
        $date = explode(" ", $date);
        $date[1] = str_replace("janvier", "January", $date[1]);
        $date[1] = str_replace("février", "February", $date[1]);
        $date[1] = str_replace("mars", "March", $date[1]);
        $date[1] = str_replace("avril", "April", $date[1]);
        $date[1] = str_replace("mai", "May", $date[1]);
        $date[1] = str_replace("juin", "June", $date[1]);
        $date[1] = str_replace("juillet", "July", $date[1]);
        $date[1] = str_replace("août", "August", $date[1]);
        $date[1] = str_replace("septembre", "September", $date[1]);
        $date[1] = str_replace("octobre", "October", $date[1]);
        $date[1] = str_replace("novembre", "November", $date[1]);
        $date[1] = str_replace("décembre", "December", $date[1]);
        $date = implode(" ", $date);
        return $date;
    }

}