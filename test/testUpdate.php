<?php

require '../bddConnect.php';
require '../controllers/ArticleManager.php';


$testUpdate = new ArticleManager($pdo);


// --------------------------------------TEST UPDATE TABLE ARTICLES ----------------------------------------------------

$id_article = 6;
$titre_article = "Mon deuxieme article";
$contenu_article = "Ceci est une mise à jour du contenu";


$result = $testUpdate->updateArticle($id_article,$titre_article,$contenu_article);

if($result) {
    echo"La mise à jour a été faite";
} else {
    echo "La mise à jour à échouée";
}

 ?>