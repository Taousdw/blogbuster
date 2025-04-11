<?php
$host = 'localhost';
$dbname = 'blogbuster';
$username = 'taous';
$password = 'taous';
$port = 8888;
try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, $port);
    
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}

?>