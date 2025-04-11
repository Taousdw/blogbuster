<?php


class CommentaireManager {
    private $pdo;




public function __construct($pdo) {
    $this->pdo = $pdo;
}



public function getCommentaire() {

    $query = $this->pdo->query("SELECT * FROM commentaires");
    return $query->fetchAll(PDO::FETCH_ASSOC);

}







}















?>