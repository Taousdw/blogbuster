<?php
require '../controllers/bddConnect.php';
require 'commentaireManager';


class Commentaire {
    private $id_commentaire;
    private $contenu_commentaire;
    private $date_commentaire;
    private $id_utilisateur;
    private $id_article;


    public function __construct($id_commentaire,$contenu_commentaire,$date_commentaire,$id_utilisateur,$id_article) {
        $this->id_commentaire = $id_commentaire;
        $this->contenu_commentaire = $contenu_commentaire;
        $this->date_commentaire = $date_commentaire;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_article = $id_article;
    }

    public function afficher() {
        echo "<br>ID Commentaire : ".$this->id_commentaire."<br>";
        echo "Contenu Commentaire : ".$this->contenu_commentaire."<br>";
        echo "Date Commentaire : ".$this->date_commentaire."<br>";
        echo "Id Utilisateur : ".$this->id_utilisateur."<br>";
        echo "Id Article : ".$this->id_article."<br>";
    }


}


 

















?>