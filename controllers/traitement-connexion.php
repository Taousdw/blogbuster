<?php
session_start();
require '../bddConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mail = trim($_POST['mailConnexion'] ?? '');
    $password = trim($_POST['passwordConnexion'] ?? '');


    if (empty($mail) || empty($password)) {
    $_SESSION['errorConnexion'] = "Veuillez remplir tous les champs";
    header("Location: ../view/form-connexion.php");
    exit;
}

    

    // Vérification dans la base
    $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur = ?");
    $query->execute([$mail]);
    $user = $query->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['errorConnexion'] = "Email ou mot de passe inconnu";
        header("Location: ../view/form-connexion.php");
        exit;
    } 
    $_SESSION['user'] = [
        'id_utilisateur' => $user['id_utilisateur'],
        'role' => $user['role_utilisateur'],  
        'email' => $user['email_utilisateur'],
        'nom' => $user['nom_utilisateur'] ?? '',      
        'prenom' => $user['prenom_utilisateur'] ?? ''
    ];

    
    
    header("Location: ../index.php");
    exit;

}
