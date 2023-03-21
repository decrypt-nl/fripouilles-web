<?php

$host = '192.168.1.63';
$dbname = 'fripouilles'; 
$username = 'admfrip'; 
$password = 'root'; 

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $e) {
    
    die("Erreur : " . $e->getMessage());
}
?>
