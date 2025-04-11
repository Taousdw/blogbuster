<?php

require '../controllers/bddConnect.php';
require 'CategorieManager.php';


class Categorie {
    private $id_categorie;
    private $nom_categorie;



    public function __construct($id_categorie,$nom_categorie) {
        $this->id_categorie = $id_categorie;
        $this->nom_categorie = $nom_categorie;
    }


    public function afficher() {
        echo "Id Catégorie : ".$this->id_categorie."<br>";
        echo "Nom Catégorie : ".$this->nom_categorie."<br>";
    }

}



?>