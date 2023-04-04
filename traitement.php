<?php

// Récupération des données envoyées depuis l'application Android
$startTime = $_GET['startTime'];
$endTime = $_GET['endTime'];
$meal = $_GET['meal'];
$expenses = $_GET['expenses'];

// Connexion à la base de données MySQL
$host = '169.254.9.74';
$dbname = 'fripouilles';
$username = 'admfrip';
$password = 'root';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la base de données : " . $e->getMessage());
}

// Insertion des données dans la table "gardes"
$sql = "INSERT INTO assistante (heure_depart, heure_arrivee, repas, frais) VALUES (:heure_depart, :heure_arrivee, :raps, :frais)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':heure_depart', $startTime);
$stmt->bindParam(':heure_arrivee', $endTime);
$stmt->bindParam(':repas', $meal);
$stmt->bindParam(':frais', $expenses);

if ($stmt->execute()) {
    $result = array('result' => 'success');
} else {
    $result = array('result' => 'error');
}

// Envoi de la réponse au format JSON à l'application Android
header('Content-Type: application/json');
echo json_encode($result);
