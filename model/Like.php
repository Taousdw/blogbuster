<?php
require '../controllers/bddConnect.php';
require 'LikeManager.php';


class Like {
    private $id_article;
    private $id_utilisateur;


    public function __construct($id_article,$id_utilisateur) {
        $this->id_article = $id_article;
        $this->id_utilisateur = $id_utilisateur;
    }




    public function afficher() {
        echo "<br>ID Article: ".$this->id_article."<br>";
        echo "ID Utilisateur: ".$this->id_utilisateur."<br>";
    }


}



$like1 = new LikeManager($pdo);

print_r($like1->getLike()); 


 
















?>