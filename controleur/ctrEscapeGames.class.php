<?php

require_once "modele/escapeGame.class.php";
require_once "vue/vue.class.php";

class ctrEscapeGames
{
    public $escapeGames;
    public $escapeGame;
    public $ch;
    public $options;
    public $r;
    public $info;

    public function __construct()
    {
        $this->escapeGames = new escapeGame; 

        if(isset($_GET["escapeGame"])){
            $this->escapeGame = $this->escapeGames->getEscapeGame($_GET["escapeGame"]);

            if(($this->escapeGame["x"]==0) && ($this->escapeGame["y"]==0))
            {
                $this->ch = curl_init();

                $this->options = array(
                    CURLOPT_URL => "http://api.positionstack.com/v1/forward?access_key=8e1f3883571571dbaade3511a59d7e2b&query=". urlencode($this->escapeGame["address"]),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => true,
                );
                curl_setopt_array($this->ch, $this->options);

                $this->r = curl_exec($this->ch);

                $this->result = json_decode($this->r);

        

                // Verif des erreurs
                if(curl_errno($this->ch) === 0){
                    $this->result = json_decode($this->r);
                    $latitudeX = $this->result->data[0]->latitude;
                    $longitudeY = $this->result->data[0]->longitude;
                    $idEG = $_GET["escapeGame"];
                    $this->escapeGames->addXY($latitudeX, $longitudeY, $idEG);
                }
                else
                    throw new Exception("Coordonnées introuvables => (".curl_errno($this->ch).")". curl_error($this->r));
            }
        }
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
        $reviewsEG = $this->escapeGames->getReviewEG($_GET["escapeGame"]);
        $qAndAEG = $this->escapeGames->getQAndAEG($_GET["escapeGame"]);
        $escapeGame = $this->escapeGames->getEscapeGame($_GET["escapeGame"]);
        $title = "Escape Game - Kaiserstuhl escape";
        $objVue = new vue("EscapeGame");
        $objVue->afficher(array("escapeGame" => $escapeGame, "reviewsEG" => $reviewsEG, "qAndAEG" => $qAndAEG), $title);
    }

    public function buyEG()
    {
        $title = "Escape Game - Payment";
        $objVue = new vue("buyEG");
        $objVue->afficher(array("buyEG" => $_POST), $title);
    }
}