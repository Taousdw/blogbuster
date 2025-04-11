<?php
require '../controllers/bddConnect.php';
require 'ReponseManager.php';


class Reponse {
    private $id_reponse;
    private $id_commentaire;
    private $id_utilisateur;
    private $date_reponse;
    private $commentaire_reponse;


    public function __construct($id_reponse,$id_commentaire,$id_utilisateur,$date_reponse,$commentaire_reponse) {
        $this->id_reponse = $id_reponse;
        $this->id_commentaire = $id_commentaire;
        $this->id_utilisateur = $id_utilisateur;
        $this->date_reponse = $date_reponse;
        $this->commentaire_reponse = $commentaire_reponse;
    }




    public function afficher() {
        echo "<br>ID Reponse: ".$this->id_reponse."<br>";
        echo "ID Commentaire: ".$this->id_commentaire."<br>";
        echo "ID Utilisateur: ".$this->id_utilisateur."<br>";
        echo "Date de la réponse: ".$this->date_reponse."<br>";
        echo "Commentaire de la réponse: ".$this->commentaire_reponse."<br>";
    }


}


