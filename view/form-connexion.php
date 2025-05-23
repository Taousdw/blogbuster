
<?php

session_start();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
   
    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/form.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php
    require '../view/header.php';
    ?>
<main>
    <div class="form-container">
        <div class="onglets">
            <a id="btn-connexion">Connexion</a>
        </div>
        <form action="../controllers/traitement-connexion.php" method="post" id="formConnexion">
            <div class="mail-password-container first-view">
                <input type="email" name="mailConnexion" id="mailConnexion" placeholder="E-MAIL">
                <p id="msgErrorEmailConnexion"></p>
                <input type="password" name="passwordConnexion" id="passwordConnexion" placeholder="MOT DE PASSE">
                <p id="msgErrorPasswordConnexion"></p>
                <input type="submit" value="Se connecter" id="connexion"> 
                <?php
                if (isset($_SESSION['errorConnexion'])) {
                    echo '<p id="msgErrorConnexion" style="color:red;">' . htmlspecialchars($_SESSION['errorConnexion']) . '</p>';
                    unset($_SESSION['errorConnexion']);
                }
                ?>

            </div>

                <div id="redirection-inscription">
                    <p>Pas encore de compte ? 
                        <a href="form-inscription.php">Inscrivez-vous ici</a>
                    </p>
                </div>
                   
            </div>
               
                
    

        </form>
    </main>    

           
        
    </div>
    <?php
    require '../view/footer.php';
    ?>
    <script src="./form-connexion.js"></script>
</body>
</html>