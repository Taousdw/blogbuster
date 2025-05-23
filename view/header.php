<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/style.css">
    
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
   <header class="header">
    <div class="logo-title">
        <a href="../index.php"><img src="" alt="imageLogo"></a>
        <h1>BLOG-BUSTER</h1>  
    </div>
    
    <nav>
        <ul>
            <li>Travel</li>
            <li>Beauty</li>
            <li>Fitness</li>
        </ul>
    </nav>
   
   <div class="user-account">
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "blogueur"):?> 
            <a href="/blogbuster/controllers/traitement_deconnexion.php">
               <img src="/blogbuster/assets/img/icons8-sortie-50.png" alt="icon-deconnexion">
            </a>
            <a href="/blogbuster/view/dashboard.php">
                <img src="/blogbuster/assets/img/icons8-stylo-à-plume-50.png" alt="">
             </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === "lecteur"):?>
            <a href="/blogbuster/controllers/traitement_deconnexion.php">
                <img src="/blogbuster/assets/img/icons8-sortie-50.png" alt="icon-deconnexion">
            </a>
        <?php else: ?>
            <a href="/blogbuster/view/form-connexion.php">
                <img src="/blogbuster/assets/img/icons8-utilisateur-48.png" alt="icon-connexion">
            </a>
        <?php endif; ?>
       
      
    </div>
  
    
</header>
   

    <script src="../view/header.js"></script>
</body>
</html>