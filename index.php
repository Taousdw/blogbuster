<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="./assets/header.css">
    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

<?php
session_start();

require_once './bddConnect.php';
require_once './view/header.php';
require_once './controllers/ArticleManager.php';
require_once './model/Article.php';
?>

<main class="travel-page">
    <h1>Au cœur de nos voyages</h1> 
    

    <section class="article-recent">
        <?php
        $articleManager = new ArticleManager($pdo);

        // Article principal
        $lastArticle = $articleManager->lastArticleByCategorie(2);
        if ($lastArticle) : ?>
            <article class="first">
                <h2><?= $lastArticle['titre_article'] ?></h2>
                <div class="lastImage">
                    <img src="<?= $lastArticle['image'] ?>" alt="Image de <?= $lastArticle['titre_article'] ?>">
                </div>
                <p><?= $lastArticle['contenu_article'] ?></p>
                <p><?= $lastArticle['date_article'] ?></p>
                <p>Ecrit par <?=$lastArticle['nom_utilisateur']." ".$lastArticle['prenom_utilisateur']?></p>
                
            </article>
        <?php endif; ?>

        <?php
        // Article secondaire
        $articleRecent = $articleManager->getArticle(10);
        if ($articleRecent) : ?>
           
            <article class="second">
                <h2>Articles récents</h2>
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
           
        <?php endif; ?>
        <?php
         $articleRecent = $articleManager->getArticle(11);
        if ($articleRecent) : ?>
           
            
               
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
           
        <?php endif; ?>
        <?php

         $articleRecent = $articleManager->getArticle(13);
        if ($articleRecent) : ?>
           
            
                
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
            
        <?php endif; ?>
         <?php

         $articleRecent = $articleManager->getArticle(12);
        if ($articleRecent) : ?>
           
            
                
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
            </article>
        <?php endif; ?>
        
    </section>
</main>

<?php require './view/footer.php'; ?>
<script src="../header.js"></script>
</body>
</html>













