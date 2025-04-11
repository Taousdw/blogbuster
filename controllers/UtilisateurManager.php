<?php


class UtilisateurManager {
    private $pdo;




    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function getAfficher() {
        $query = $this->pdo->query("SELECT * FROM utilisateurs");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }







}


















?>