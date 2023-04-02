<?php 
require_once('config.php');
// Récupération des données envoyées par l'application mobile
$data = json_decode(file_get_contents('php://input'), true);