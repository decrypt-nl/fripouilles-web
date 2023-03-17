<?php
// Informations de connexion à la base de données
$host = '192.168.1.63'; // Adresse du serveur de base de données
$dbname = 'fripouilles'; // Nom de la base de données
$username = 'admfrip'; // Nom d'utilisateur pour se connecter à la base de données
$password = 'root'; // Mot de passe pour se connecter à la base de données

// Connexion à la base de données avec PDO
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
