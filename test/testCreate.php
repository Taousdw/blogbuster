<?php

require '../bddConnect.php';
require '../controllers/ArticleManager.php';


// --------------------------------------TEST DU CREATE ----------------------------------------------------

$articleManager = new ArticleManager($pdo);

$titre_article = "Mon premier article";
$contenu_article = "Ceci est le contenu de mon premier article!";
$id_utilisateur = 1; 
$id_categorie = 2;  

$articleId = $articleManager->createArticle($titre_article, $contenu_article, $id_utilisateur, $id_categorie);

if ($articleId) {
    echo "Article créé avec succès. L'ID de l'article est : " . $articleId;
} else {
    echo "Erreur lors de la création de l'article.";
}

?>
