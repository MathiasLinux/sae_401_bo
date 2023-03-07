<?php

require_once "vue/vue.class.php";

class ctrGiftCards
{
    public function giftCards()
    {
        $title = "Gift Cards - Kaiserstuhl escape";
        $objVue = new vue("GiftCards");
        $objVue->afficher(array(), $title);
    }
}