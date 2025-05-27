<?php
require_once __DIR__ . '/../config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Fitness</title>
    
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/footer.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/style.css">
</head>
<body>

<?php


require_once __DIR__ . '/../bddConnect.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/../controllers/ArticleManager.php';
require_once __DIR__ . '/../model/Article.php';
?>

<main class="travel-page">
    <h1>Boostez votre forme avec nos conseils fitness</h1> 
    

    <section class="article-recent">
        <?php
        $articleManager = new ArticleManager($pdo);

        // Article principal
        $lastArticle = $articleManager->lastArticleByCategorie(1);
        if ($lastArticle) : ?>
            <article class="first">
                <h2><?= $lastArticle['titre_article'] ?></h2>
                <div class="lastImage">
                    <img src="/blogbuster/<?= $lastArticle['image'] ?>" alt="Image de <?= $lastArticle['titre_article'] ?>">
                </div>
                <p><?= $lastArticle['contenu_article'] ?></p>
                <p><?= $lastArticle['date_article'] ?></p>
                <p>Ecrit par <?=$lastArticle['nom_utilisateur']." ".$lastArticle['prenom_utilisateur']?></p>
            </article>
        <?php endif; ?>

        <?php
        // Article secondaire
        $articleRecent = $articleManager->getArticle(20);
        if ($articleRecent) : ?>
           
            <article class="second">
                <h2>Articles récents</h2>
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="/blogbuster/<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
           
        <?php endif; ?>
        <?php
         $articleRecent = $articleManager->getArticle(21);
        if ($articleRecent) : ?>
           
            
               
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="/blogbuster/<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
           
        <?php endif; ?>
        <?php

         $articleRecent = $articleManager->getArticle(22);
        if ($articleRecent) : ?>
           
            
                
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="/blogbuster/<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
            
        <?php endif; ?>
         <?php

         $articleRecent = $articleManager->getArticle(23);
        if ($articleRecent) : ?>
           
            
                
                <h4><?= $articleRecent['titre_article'] ?></h4>
                <div class="lastImage">
                    <img src="/blogbuster/<?= $articleRecent['image'] ?>" alt="Image de <?= $articleRecent['titre_article'] ?>">
                </div>
                
            </article>
        <?php endif; ?>
        
    </section>
</main>

<?php require_once __DIR__ . '/../view/footer.php'; ?>

</body>
</html>
