<?php

require_once "vue/vue.class.php";

class escapeGame extends bdd
{
    public function getEscapeGames()
    {
        $req = "SELECT * FROM escapeGame";
        $escapeGames = $this->execReq($req);
        return $escapeGames;
    }

}