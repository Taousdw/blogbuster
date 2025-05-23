<?php

class ArticleManager {
    private $pdo;



    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    
    public function getArticle($id_article) {
        
        $query = $this->pdo->prepare("SELECT titre_article, contenu_article, image, date_article  FROM articles WHERE id_article = ?");
        $query->execute([$id_article]);
        return $query->fetch(PDO::FETCH_ASSOC); 
    }

    public function createArticle($titre_article,$contenu_article,$id_utilisateur,$id_categorie,$image) {
        $query = $this->pdo->prepare("INSERT INTO articles (titre_article,contenu_article,id_utilisateur,id_categorie,date_article,image) VALUES (?,?,?,?,?,NOW())");
        $result = $query->execute([$titre_article,$contenu_article,$id_utilisateur,$id_categorie,$image]);
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
            $this->pdo->beginTransaction();

            $queryAnswer = $this->pdo->prepare("DELETE FROM reponse WHERE id_commentaire IN (SELECT id_commentaire FROM commentaires WHERE id_article = ?)");   
            $queryAnswer->execute([$id_article]);

            $queryComment = $this->pdo->prepare("DELETE FROM commentaires WHERE id_article = ? ");
            $queryComment->execute([$id_article]);

            $queryArticle = $this->pdo->prepare("DELETE FROM articles WHERE id_article = ? ");
            $queryArticle->execute([$id_article]);

            $this->pdo->commit();
            echo "Article supprimé avec succès !";


        } catch (Exception $e){
             $this->pdo->rollBack();
             echo "Erreur lors de la suppression : " . $e->getMessage();
        }
    }    
}


?>