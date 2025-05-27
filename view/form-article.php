<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire article</title>
     <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/form-article.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <?php   
        require_once '../bddConnect.php';
        require_once '../view/header.php';

         if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'blogueur') {
  
        header('Location:/blogbuster/index.php');
        exit();
    }
    ?>
    <h1 class="titre-formulaire-article">Publier un nouvel article</h1>
    
    <form id="formulaire-article" action="../controllers/ajoutFormulaireArticle.php" method="post" enctype="multipart/form-data">
        <label for="titre-article">Titre</label>
        <input type="text" name="titre_article" id="titre-article">
        <div class="radio-group">
            <label><input type="radio" name="categorie_article" value="1" id="fitness" required> Fitness</label>
            <label><input type="radio" name="categorie_article" value="2" id="travel"> Travel</label>
            <label><input type="radio" name="categorie_article" value="3" id="beauty"> Beauty</label>
        </div>
        <label for="contenuArticle">Contenu article</label>
        <textarea name="contenu_article" id="contenu_article"></textarea>

        <label for="image">Image</label>
        <input type="file" id="image_article" name="image_article" accept="image/*">
      
        <button type="submit">Publier</button>

    </form>

  

  <?php require '../view/footer.php'; ?>
  <script src="../form-article.js"></script>
  
</body>
</html>

 

