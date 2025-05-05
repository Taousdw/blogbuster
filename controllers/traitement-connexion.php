<?php
session_start();
require '../bddConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Si les champs sont vides
    if (empty($_POST["mailConnexion"]) || empty($_POST["passwordConnexion"])) {
        $_SESSION['errorMail'] = "Veuillez remplir tous les champs";
        header("Location: ../view/form.php");
        exit;
    }

    $mail = htmlspecialchars($_POST["mailConnexion"]);
    $password = htmlspecialchars($_POST["passwordConnexion"]);

    // Vérification du mail
    if (!preg_match("/^[\w.-]+@[\w.-]+\.\w{2,}$/", $mail)) {
        $_SESSION['errorMail'] = "Email invalide";
        header("Location: ../view/form.php");
        exit;
    }

    // Vérification du mot de passe
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        $_SESSION['errorPassword'] = "Mot de passe non valide";
        header("Location: ../view/form.php");
        exit;
    }

    // Vérification dans la base
    $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur = ?");
    $query->execute([$mail]);
    $user = $query->fetch();

    if (!$user) {
        $_SESSION['errorMail'] = "L'email est inconnu";
        header("Location: ../view/form.php");
        exit;
    }

    if (password_verify($password, $user['password'])) {
        // Connexion OK
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION['errorPassword'] = "Mot de passe incorrect";
        header("Location: ../view/form.php");
        exit;
    }
}
