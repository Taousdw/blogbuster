<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);








require_once('../bddConnect.php');
require_once('../controllers/ArticleManager.php');
require_once('../model/Article.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   

    $titre = $_POST['titre_article'] ?? '';
    $contenu = $_POST['contenu_article'] ?? '';
    $id_categorie = $_POST['categorie_article'] ?? '';
    $id_utilisateur = $_SESSION['user']['id_utilisateur'] ?? null;
    $date_article = date('Y-m-d H:i:s');
   

    // === GESTION DE L’IMAGE ===
    $nom_image_finale = null;

    if (isset($_FILES['image_article']) && $_FILES['image_article']['error'] === 0) {
        $dossier_upload = __DIR__ . '/../uploads/';
        $nom_temporaire = $_FILES['image_article']['tmp_name'];
        $taille_max = 2 * 1024 * 1024; // 2 mégaoctets en octets

    if ($_FILES['image_article']['size'] > $taille_max) {
        echo "Erreur : L'image dépasse la taille maximale autorisée de 2 Mo.";
         exit;
}
        $extension = pathinfo($_FILES['image_article']['name'], PATHINFO_EXTENSION);
        $nom_unique = 'img_' . uniqid() . '.' . $extension;
        $chemin_destination = $dossier_upload . $nom_unique;

        // Créer le dossier s'il n'existe pas
        if (!file_exists($dossier_upload)) {
            mkdir($dossier_upload, 0777, true);
        }
        var_dump($nom_temporaire);
        var_dump($chemin_destination);
        var_dump(is_writable(dirname($chemin_destination))); // est-ce que le dossier est accessible en écriture ?

        if (move_uploaded_file($nom_temporaire, $chemin_destination)) {
            $nom_image_finale = 'uploads/' . $nom_unique;
            var_dump($nom_image_finale);
        } else {
            echo "Erreur : impossible de déplacer l’image.";
            exit;
        }
        
    }
    
    // === INSÉRER EN BASE DE DONNÉES ===
    if ($id_utilisateur !== null && $titre && $contenu && $id_categorie) {
        $requete = "INSERT INTO articles 
        (titre_article, contenu_article, date_article, id_utilisateur, id_categorie, image)
        VALUES (:titre, :contenu, :date_article, :id_utilisateur, :id_categorie, :image)";

        $requete_preparee = $pdo->prepare($requete);

        $requete_preparee->bindValue(':titre', $titre, PDO::PARAM_STR);
        $requete_preparee->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $requete_preparee->bindValue(':date_article', $date_article, PDO::PARAM_STR);
        $requete_preparee->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $requete_preparee->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
        $requete_preparee->bindValue(':image', $nom_image_finale, PDO::PARAM_STR);
        if ($requete_preparee->execute()) {
            echo "Article inséré avec succès !";
            header('Location: ../view/dashboard.php'); 
            exit;
        } else {
            echo "Erreur lors de l’insertion en BDD.";
        }
    } else {
        echo "Données manquantes ou utilisateur non connecté.";
    }

} else {
       
exit;
    echo "Accès interdit";
}
?>