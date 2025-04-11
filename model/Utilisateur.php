<?php
require '../controllers/bddConnect.php';
require 'UtilisateurManager.php';



// Définition de la classe Utilisateur
class Utilisateur {
    // Déclaration des propriétés privées de l'utilisateur
    private $id_utilisateur;
    private $role_utilisateur;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $email_utilisateur;

    // Constructeur permettant d'initialiser un objet Utilisateur avec ses attributs
    public function __construct($id_utilisateur,$role_utilisateur,$nom_utilisateur,$prenom_utilisateur,$email_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
        $this->role_utilisateur = $role_utilisateur;
        $this->nom_utilisateur = $nom_utilisateur;
        $this->prenom_utilisateur = $prenom_utilisateur;
        $this->email_utilisateur = $email_utilisateur;
    }

    // Méthode pour afficher les informations de l'utilisateur
    public function afficher() {
        echo "<br> ID Utilisateur: ".$this->id_utilisateur."<br>";
        echo "<br> Role Utilisateur: ".$this->role_utilisateur."<br>";
        echo "<br> Nom Utilisateur: ".$this->nom_utilisateur."<br>";
        echo "<br> Prenom Utilisateur: ".$this->prenom_utilisateur."<br>";
        echo "<br> Email Utilisateur: ".$this->email_utilisateur."<br>";

    }


}


 


?>