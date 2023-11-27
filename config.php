<?php

$host = ''; // Adresse ip
$dbname = ''; // Nom de la base de données
$username = ''; // Nom d'utilisateur
$password = ''; // Le mot de passe 

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $e) {
    
    die("Erreur : " . $e->getMessage());
}
?>
