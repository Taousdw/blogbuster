<?php

class CategorieManager {
    private $pdo;





    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function getCategorie() {
        $query = $this->pdo->query("SELECT * FROM categories");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }









}







?>