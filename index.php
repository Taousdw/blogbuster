<!DOCTYPE html>
<html lang="en">
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
    <h1>Au coeur de nos voyages</h1> 
    
   <section class="article-recent">
    

    <?php
    // Création de l'objet Article 
    $article = new ArticleManager($pdo);

   
    $articleRecent = $article->getArticle(10); 

    if ($articleRecent) : ?>
        <article id="first">
            <h3><?= $articleRecent['titre_article']  ?></h3>
            <img src="<?=$articleRecent['image'] ?>" alt="Image de <?=$articleRecent['titre_article'] ?>">
            <p><?= $articleRecent['contenu_article'] ?></p>
            
        </article>
    <?php else : ?>
        <p>Aucun article récent disponible.</p>
    <?php endif; ?>



 <?php
    // Création de l'objet Article 
    $article = new ArticleManager($pdo);

   
    $articleRecent = $article->getArticle(10); 

    if ($articleRecent) : ?>
        <article id="second">
            <h3><?= $articleRecent['titre_article']  ?></h3>
            <img src="<?=$articleRecent['image'] ?>" alt="Image de <?=$articleRecent['titre_article'] ?>">
            <p><?= $articleRecent['contenu_article'] ?></p>
            
        </article>
    <?php else : ?>
        <p>Aucun article récent disponible.</p>
    <?php endif; ?>



</section>

    

   
   
   
    
    
   
</main>

<?php
require './view/footer.php';
?>


</body>
</html>












