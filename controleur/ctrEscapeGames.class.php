<?php

require_once "modele/escapeGame.class.php";
require_once "vue/vue.class.php";

class ctrEscapeGames
{
    public $escapeGames;

    public function __construct()
    {
        $this->escapeGames = new escapeGame();
    }

    public function escapeGames()
    {
        $escapeGames = $this->escapeGames->getEscapeGames();
        $title = "Escape Games - Kaiserstuhl escape";
        $objVue = new vue("EscapeGames");
        $objVue->afficher(array("escapeGames" => $escapeGames), $title);
    }

    public function escapeGame()
    {
        $title = "Escape Game - Kaiserstuhl escape";
        $objVue = new vue("EscapeGame");
        $objVue->afficher(array(), $title);
    }
}