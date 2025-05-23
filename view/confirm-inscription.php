<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation-inscription</title>

    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/confirm-inscription.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/style.css">
    
</head>
<body>

     <?php
    require '../view/header.php';
    ?>

    <div class="confirmInscription">
        <p>Votre inscription a bien été enregistrée</p>
        <img src="../assets/img/icon-validation.svg" alt="icon-validation-inscription">
        <a href="../index.php" id="btn-retour-confirmInscription">Retour</a>
    </div>

    <?php
    require '../view/footer.php';
    ?>

    <script src="./confirm-inscription.js"></script>
</body>
</html>