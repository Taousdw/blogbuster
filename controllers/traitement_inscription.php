<?php
session_start();
require '../bddConnect.php';





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["role"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["passwordVerify"])) {

        $role = $_POST["role"];
        $mail = htmlspecialchars($_POST["mail"]);
        $password = htmlspecialchars($_POST["password"]);
        $passwordVerify = htmlspecialchars($_POST["passwordVerify"]);

        // Vérification du mail
        if (!preg_match("/^[\w.-]+@[\w.-]+\.\w{2,}$/", $mail)) {
            $_SESSION['error'] = "Email invalide"; // Mettre l'erreur dans la session
            header("Location: ../view/form.php");
            exit;
        }

        // Vérification du mot de passe
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
            $_SESSION['error'] = "Mot de passe non valide"; // Mettre l'erreur dans la session
            header("Location: ../view/form.php");
            exit;
        }

        // Vérification si mot de passe est identique 
        if ($password !== $passwordVerify) {
            $_SESSION['error'] = "Mot de passe non identique"; // Mettre l'erreur dans la session
            header("Location: ../view/form.php");
            exit;
        }

        // Vérifier si l'utilisateur existe déjà
        $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur = ?");
        $query->execute([$mail]);
        $user = $query->fetch();

        if ($user) {
            $_SESSION['error'] = "L'email est déjà utilisé"; // Mettre l'erreur dans la session
            header("Location: ../view/form.php");
            exit;
        }

        // Hachage du mot de passe
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insertion selon le rôle
        if ($role === "blogueur") {
            if (empty($_POST["nomBlogueur"]) || empty($_POST["prenomBlogueur"])) {
                $_SESSION['error'] = "Nom et prénom obligatoires pour un blogueur"; // Mettre l'erreur dans la session
                header("Location: ../view/form.php");
                exit;
            }

            $nom = htmlspecialchars($_POST["nomBlogueur"]);
            $prenom = htmlspecialchars($_POST["prenomBlogueur"]);

            if (strlen($nom) < 2 || strlen($prenom) < 2) {
                $_SESSION['error'] = "Nom et prénom doivent avoir au moins deux caractères"; // Mettre l'erreur dans la session
                header("Location: ../view/form.php");
                exit;
            }

            $query = $pdo->prepare("INSERT INTO utilisateurs (role_utilisateur, nom_utilisateur, prenom_utilisateur, email_utilisateur, password) VALUES (?, ?, ?, ?, ?)");
            $result = $query->execute([$role, $nom, $prenom, $mail, $passwordHash]);

            if ($result) {
                
                header("Location: ../view/confirm-inscription.php");
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de l'insertion dans la base de données"; // Mettre l'erreur dans la session
                header("Location: ../view/form.php");
                exit;
            }

        } elseif ($role === "lecteur") {
            $query = $pdo->prepare("INSERT INTO utilisateurs (role_utilisateur, email_utilisateur, password) VALUES (?, ?, ?)");
            $result = $query->execute([$role, $mail, $passwordHash]);

            if ($result) {
                $_SESSION['message'] = "Inscription réussie !"; // Message de succès dans la session
                header("Location: ../view/confirm-inscription.php");
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de l'insertion dans la base de données"; // Mettre l'erreur dans la session
                header("Location: ../view/form.php");
                exit;
            }

        } else {
            $_SESSION['error'] = "Rôle invalide"; // Mettre l'erreur dans la session
            header("Location: ../view/form.php");
            exit;
        }
    }
}
?>













