<?php

/*************************************
 * Classe chargée de l'affichage des vues
 *************************************/
class vue
{

    private $fichierVue;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
    // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...

    /*******************************************************
     * Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
     * Entrée :
     * action [string] : action demandée
     *
     * Sortie :
     * $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue
     *
     * Retour :
     *******************************************************/
    public function __construct($action)
    {
        $this->fichierVue = "vue/vue" . $action . ".php";
    }

    /*******************************************************
     * Affiche dans le gabarit la vue correspondant à l'action demandée
     * Entrée :
     * data [array] : tableau associatif contenant les données à afficher dans la vue
     *
     * Retour :
     *******************************************************/
    public function afficher($data, $title)
    {
        global $conf;
//    $titre = "";      // Le titre de la page est généré dans le fichierVue

        extract($data);   // Extrait les valeurs du tableau associatif $data dans des variables

        ob_start();      // Démarre la temporisation de sortie
        require $this->fichierVue;   // Génère le contenu de la page en fonction de l'action

        $contenu = ob_get_clean();  // Arrête la temporisation et récupère le contenu généré

        $footer = "&copy; MMI Mulhouse"; // Le pied de page est généré dans le gabarit

        require "gabarit.php";  // Affiche le gabarit
    }
}