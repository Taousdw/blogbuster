<?php
require '/model/Article.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
</head>
<body>
    <h1>Liste des Articles</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($articles) {
                 foreach ($articles as $article) {
                 ?>
                    <tr>
                        <td><?php echo htmlspecialchars($article['id_article']); ?></td>
                        <td><?php echo htmlspecialchars($article['titre_article']); ?></td>
                        <td><?php echo htmlspecialchars($article['contenu_article']); ?></td>
                        <td><?php echo htmlspecialchars($article['date_article']); ?></td>
                    </tr>
                <?php }}  ?>
                <tr><td colspan="4">Aucun article trouvé.</td></tr>
              <?php?>
        </tbody>
    </table>
</body>
</html>












