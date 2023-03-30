<?php

$host = '172.23.10.35';
$dbname = 'fripouilles'; 
$username = 'admfrip'; 
$password = 'root'; 

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $e) {
    
    die("Erreur : " . $e->getMessage());
}
?>
