<?php

class ArticleManager {
    private $pdo;



    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    // public function getArticle() {
    //     $query = $this->pdo->query("SELECT * FROM articles");
    //     return $query->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function createArticle($titre_article,$contenu_article,$id_utilisateur,$id_categorie) {
        $query = $this->pdo->prepare("INSERT INTO articles (titre_article,contenu_article,id_utilisateur,id_categorie,date_article) VALUES (?,?,?,?,NOW())");
        $result = $query->execute([$titre_article,$contenu_article,$id_utilisateur,$id_categorie]);
        if($result) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function readArticle($mot_cle) {
        $query = $this->pdo->prepare("SELECT titre_article,contenu_article,id_utilisateur,nbr_like,date_article FROM articles WHERE titre_article LIKE ?");
        $query->execute(["%".$mot_cle."%"]);
       return $query->fetch(PDO::FETCH_ASSOC);
       
    }

    
    public function updateArticle($id_article, $titre_article, $contenu_article) {
        try {
            $query = $this->pdo->prepare("UPDATE articles SET titre_article = ?, contenu_article = ? WHERE id_article = ?");
            $success = $query->execute([$titre_article, $contenu_article, $id_article]);

    
            if (!$success) {
                echo "Erreur SQL : " . implode(" ", $query->errorInfo());
            }
    
            return $success;
        } catch (PDOException $e) {
            echo "Exception PDO : " . $e->getMessage();
            return false;
        }
    }


    public function deleteArticle($id_article) {
        try{

            $query = $this->pdo->prepare("DELETE FROM articles WHERE id_article = ?")
            $success = $query->execute($id_article,$titre_article,$date_article,$contenu_article,$nbr_article,$id_utilisateur,$id_categorie,$nbr_like); 
        }
        
        if($sucess) {
            echo "Succés de la supression";
        } else {
            echo "La supression a échouée";
        }
    }

    try{
        $this->pdo->beginTransaction();

        $query_reponse = $this->pdo->prepare("DELETE from reponse where id ");
    }

 
 






}




?>