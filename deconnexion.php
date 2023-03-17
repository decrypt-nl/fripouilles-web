<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION["email"])) {
    // Détruire toutes les variables de session
    session_unset();

    // Détruire la session
    session_destroy();

    // Détruire le cookie
    setcookie("PHPSESSID", "", time() - 3600);

    // Rediriger l'utilisateur vers la page de connexion
    header("accueil.php");
    exit();
} else {
    // Rediriger l'utilisateur vers la page de connexion si la session n'est pas définie
    header("accueil.php");
    exit();
}
?>
