<?php
require_once('config.php');
// Récupération des données envoyées par l'application mobile
$data = json_decode(file_get_contents('php://input'), true);

// Insertion des données dans la base de données
$heureDebut = $data['heureDebut'];
$heureArrivee = $data['heureArrivee'];
$repas = $data['repas'];
$frais = $data['frais'];

// Insertion des données dans la base de données
$sql = "INSERT INTO table_de_frais (heure_debut, heure_arrivee, repas, frais) VALUES ('$heureDebut', '$heureArrivee', '$repas', '$frais')";

if ($bdd->query($sql) === TRUE) {
    echo "Les données ont été enregistrées avec succès";
} else {
    echo "Une erreur est survenue : ";
    var_dump($bdd->errorInfo());
}
