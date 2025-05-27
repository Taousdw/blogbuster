<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    
    <?php require_once __DIR__ . '/../config.php'; ?>
    
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/style.css">
</head>
    
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
   <header class="header">
    <div class="logo-title">
        <a href="<?= BASE_URL ?>index.php"><img src="" alt="imageLogo"></a>
        <h1>BLOG-BUSTER</h1>  
    </div>
    
    <nav>
        <ul>
            <li><a href="<?= BASE_URL ?>index.php">Travel</a></li>
            <li><a href="<?= BASE_URL ?>view/beauty.php">Beauty</a></li>
            <li><a href="<?= BASE_URL ?>view/fitness.php">Fitness</a></li>
        </ul>
    </nav>
   
   <div class="user-account">
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "blogueur"):?> 
            <a href="<?= BASE_URL ?>controllers/traitement_deconnexion.php">
               <img src="<?= BASE_URL ?>assets/img/icons8-sortie-50.png" alt="icon-deconnexion">
            </a>
            <a href="<?= BASE_URL ?>view/dashboard.php">
                <img src="<?= BASE_URL ?>assets/img/icons8-stylo-à-plume-50.png" alt="">
             </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === "lecteur"):?>
            <a href="<?= BASE_URL ?>controllers/traitement_deconnexion.php">
                <img src="<?= BASE_URL ?>assets/img/icons8-sortie-50.png" alt="icon-deconnexion">
            </a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>view/form-connexion.php">
                <img src="<?= BASE_URL ?>assets/img/icons8-utilisateur-48.png" alt="icon-connexion">
            </a>
        <?php endif; ?>
       
      
    </div>
  
    
</header>
   

    <script src="<?= BASE_URL ?>view/header.js"></script>
</body>
</html>