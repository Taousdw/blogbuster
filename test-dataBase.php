<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
require "config.php";

// ----------------------Recuperer les articles---------------------------------------------------- 
?>
<h4>Aticles de la bdd</h4>
<?php
$query = $pdo->query("select * from articles");
$articlesList = $query->fetchAll();

if($articlesList) {
    foreach ($articlesList as $article) {
        echo "<br> ID: ".$article['id_article']."<br> -Titre: ".$article['titre_article']."<br> -Contenu: ".$article['contenu_article']."<br> -Date: ".$article['date_article']."-Contenu:"  .$article['contenu_article']."<br>";
    }
} else {
    echo "Aucun article trouvée.";
}

// ----------------------Recuperer les categories---------------------------------------------------- 
?>
<h4>Categories de la bdd</h4>
<?php
$query = $pdo->query("select * from categories");
$categories = $query->fetchAll();

if($categories) {
    foreach ($categories as $categorie) {
        echo "<br> ID: ".$categorie['id_categorie']."<br> -Nom: ".$categorie['nom_categorie']."<br>";
    }
} else {
    echo "Aucunes categories trouvée.";
}

// ----------------------Recuperer les commentaires---------------------------------------------------- 
?>
<h4>Commentaires de la bdd</h4>
<?php
$query = $pdo->query("select * from commentaires");
$commentaires = $query->fetchAll();

if($commentaires) {
    foreach ($commentaires as $commentaire) {
        echo "<br> ID: ".$commentaire['id_commentaire']."<br> -Contenu: ".$commentaire['contenu_commentaire']."<br> -Date: ".$commentaire['date_commentaire']."<br> -ID Utilisateur: ".$commentaire['id_utilisateur']."-ID Article:"  .$commentaire['id_article']."<br>";
    }
} else {
    echo "Aucun commentaire trouvé.";
}

// ----------------------Recuperer les likes---------------------------------------------------- 
?>
<h4>Like de la bdd</h4>
<?php

$pdo = $pdo->query("select * from liker");
$liker = $pdo->fetchAll();

if($liker) {
    foreach ($liker as $like) {
        echo "<br> ID: ".$like['id_article']."<br> Id Utilisateur: ".$like['id_utilisateur']."<br>";
    }
} else {
    echo "Auncun like trouver";
}

// ----------------------Recuperer les reponses commentaire---------------------------------------------------- 
?>
<h4>Reponse des commentaire dans la bdd</h4>
<?php






?>