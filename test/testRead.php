<?php
require '../bddConnect.php';
require '../controllers/ArticleManager.php';


// --------------------------------------TEST DU READ ----------------------------------------------------
$articleManager = new ArticleManager($pdo);



$article1 = $articleManager->readArticle("%Voyage%");

if ($article1) {
    var_dump($article1);
} else {
    echo "Erreur lors de l'affichage de l'article.";
}

?>

