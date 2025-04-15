<?php

require '../bddConnect.php';
require '../controllers/ArticleManager.php';


// --------------------------------------TEST DU DELETE ----------------------------------------------------




$articleDelete = new ArticleManager($pdo);

$articleDelete->deleteArticle(3);



?>