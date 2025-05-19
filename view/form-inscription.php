
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="../assets/form.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/footer.css">
</head>
<body>
     <?php
    require '../view/header.html';
    ?>
    <main>
    <div class="form-container" >
        <div class="onglets">
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
                <p id="msgErrorNom"></p> 
                <p id="msgErrorPrenom"></p> 
                <input type="email" name="mail" id="mail" placeholder="E-MAIL">
                <p id="msgErrorEmail"></p>
                <input type="password" name="password" id="password" placeholder="MOT DE PASSE">
                <p id="msgErrorPassword"></p>
                <input type="password" name="passwordVerify" id="passwordVerify" placeholder="CONFIRMER MOT DE PASSE">
                <p id="msgErrorPasswordVerify"></p>

               

                <input type="submit" value="S'inscrire" id="validationInscription"> 
                
            </div>

        </form>
    </main>
    <?php
    require '../view/footer.html';
    ?>
    <script src="./form.js"></script>
</body>
</html>