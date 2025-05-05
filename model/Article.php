<?php
require_once('bddConnect.php');
require 'Controllers/ArticleManager.php';



class Articles {
    private $id_article;
    private $titre_article;
    private $date_article;
    private $contenu_article;
    private $nbr_article;
    private $id_utilisateur;
    private $id_categorie;
    private $image;
    


    public function __construct($id_article,$titre_article,$date_article,$contenu_article,$id_utilisateur,$id_categorie,$nbr_like,$image) {
        $this->id_article = $id_article;
        $this->titre_article = $titre_article;
        $this->date_article = new DateTime($date_article) ;
        $this->contenu_article = $contenu_article;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_categorie = $id_categorie;
        $this->nbr_like = $nbr_like;
        $this->image = $image;
    }

    // ---------------------------------Getters------------------------------------------------

    public function GetIdArticle() {return $this->id_article;}
    public function GetTitreArticle() {return $this->titre_article;}
    public function GetDateArticle() {return $this->date_article->format('d/m/y');}
    public function GetContenuArticle() {return $this->contenu_article;}
    public function GetNbrArticle() {return $this->nbr_article;}
    public function GetNbrLike() {return $this->nbr_like;}
    public function GetImage() {return $this->image;}
    

    public function afficher() {
        echo "Id article :  ".$this->id_article."<br>";
        echo "Titre article :  ".$this->titre_article."<br>";
        echo "Date article :  ".$this->GetDateArticle()."<br>";
        echo "Contenu article :  ".$this->contenu_article."<br>";
        echo "Id utilisateur :  ".$this->id_utilisateur."<br>";
        echo "Id categorie :  ".$this->id_categorie."<br>";
        echo "Nombre de like :  ".$this->nbr_like."<br>";
        echo "Image :  ".$this->image."<br>";
    }

}



/*articleManager = new ArticleManager($pdo);
$articlesList = $articleManager->getArticle(1);


echo "<pre>";
print_r($articlesList);
echo "</pre>";*/











?>