<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test implementation article</title>
</head>

<body>
    <form action="../controllers/ajoutFormulaireArticle.php" method="post" enctype="multipart/form-data">
        <label for="titre-article">Titre</label><br>
        <input type="text" name="titre-article" id="titre-article"><br><br>
        <label for="">Catégorie</label><br>
        <label for="fitness">Fitness</label><input type="radio" name="categorie-article" value="1" id="fitness" required>
        <label for="travel">Travel</label><input type="radio" name="categorie-article" value="2" id="travel">
        <label for="beauty">Beauty</label><input type="radio" name="categorie-article" value="3" id="beauty">

        <label for="">Article</label><br>
        <textarea name="contenu_article" id="contenu_article"></textarea><br><br>

        <label for="image">Image</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
      
        <button type="submit">Publier</button>

    </form>

  

  
  <script src="./form-article.js"></script>
  
</body>
</html>

 

