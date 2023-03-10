<?php

require_once "vue/vue.class.php";

class ctrEscapeGames
{
    public function escapeGames()
    {
        $title = "Escape Games - Kaiserstuhl escape";
        $objVue = new vue("EscapeGames");
        $objVue->afficher(array(), $title);
    }
}