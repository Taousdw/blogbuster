<?php
session_start();

require_once('../bddConnect.php');
require_once('../Controllers/ArticleManager.php');
require_once('../Models/Articles.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titre_article = $_POST["titre-article"];
    $contenu_article = $_POST['contenu_article'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $id_categorie = $_POST['categorie-article'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $temporaryPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        die("Erreur : format d'image non autorisé.");
    }

    if ($fileSize > 2 * 1024 * 1024) {
        die("Erreur : l'image est trop volumineuse (max 2 Mo).");
    }

    $newFileName = uniqid('img_', true) . '.' . $fileExtension;
    $uploadDir = __DIR__ . '/../uploads/';
    $destinationPath = $uploadDir . $newFileName;

    if (!move_uploaded_file($temporaryPath, $destinationPath)) {
        die("Erreur lors du déplacement de l'image.");
    }

    } else {
    $newFileName = null;
    }

    $articleManager = new ArticleManager($pdo);
    $result = $articleManager->createArticle($titre_article, $contenu_article, $id_utilisateur, $id_categorie, $newFileName);

   if ($result) {
        header("Location: dashboard.php?success=1");
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'article.";
    }



}

?>