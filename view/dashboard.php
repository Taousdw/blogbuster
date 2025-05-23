<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/dashboard.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php
    require '../view/header.php';
    ?>
    <header class="header-dashboard">
        <h1>Bienvenue sur ton espace BlogBuster</h1>
    </header>

    <nav class="dashboard-navbar">
        <ul>
            <li><a href="./form-article.php">Ajouter un article </a></li>
            <li><a href="#">Mes articles </a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>

    <main>
        <section class="dashboard-content">
            <h2>Tableau de bord</h2>
            <p>Ici tu pourras gérer tous tes articles !</p>
        </section>
    </main>
</body>
</html>