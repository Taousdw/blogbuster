
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="../assets/form.css">
</head>
<body>
    <div class="form-container" >
        <div class="onglets">
            <a id="btn-connexion">Connexion</a>
            <a id="btn-inscription">Inscription</a>
        </div>

    
        <form action="../controllers/traitement_inscription.php" method="POST" id="formInscription">

            <div class="user-role first-view">
                <label>Je suis</label>
                <label for="lecteurRadio">Lecteur</label> <input type="radio" name="role" id="lecteurRadio" value="lecteur" required>
                <label for="blogueurRadio">Blogueur</label><input type="radio" name="role" id="blogueurRadio" value="blogueur">
            </div>

            

            <div class="mail-password-container first-view">
                <div class="BlogueurUser hidden">
                <input type="text" name="nomBlogueur" id="nomBlogueur" placeholder="NOM" >
                <input type="text" name="prenomBlogueur" id="prenomBlogueur" placeholder="PRENOM" >
               
                </div>
                <p class="msgErrorNom"></p> 
                <p class="msgErrorPrenom"></p> 
                <input type="email" name="mail" id="mail" placeholder="E-MAIL">
                <p class="msgErrorEmail"></p>
                <input type="password" name="password" id="password" placeholder="MOT DE PASSE">
                <p class="msgErrorPassword"></p>
                <input type="password" name="passwordVerify" id="passwordVerify" placeholder="CONFIRMER MOT DE PASSE">
                <p class="msgErrorPasswordVerify"></p>

               

                <input type="submit" value="S'inscrire" id="validationInscription"> 
                
            </div>

        </form>

        

        <form action="../controllers/traitement_connexion.php" method="post" id="formConnexion">
            <div class="containerConnexion hidden">
               <input type="email" name="mailConnexion" id="mailConnexion" placeholder="E-MAIL">
                <?php if (isset($_SESSION['errorMail'])): ?>
                    <p class="msgErrorEmailConnexion"><?= $_SESSION['errorMail']; ?></p>
                    <?php unset($_SESSION['errorMail']); ?>
                <?php endif; ?>

            <input type="password" name="passwordConnexion" id="passwordConnexion" placeholder="MOT DE PASSE">
            <?php if (isset($_SESSION['errorPassword'])): ?>
                <p class="msgErrorPasswordConnexion"><?= $_SESSION['errorPassword']; ?></p>
                <?php unset($_SESSION['errorPassword']); ?>
            <?php endif; ?>

                <input type="submit" value="Se connecter" id="connexion">  
                <div>
                    <label for="remember-me">Se souvenir de moi</label>
                    <input type="checkbox" name="remember-me" id="remember-me">
                   
                </div>
                <a href="">Mot de passe oublié ?</a> 
                
            </div> 

        </form>
           

           
        
    </div>
    <script src="./form.js"></script>
</body>
</html>