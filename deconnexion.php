<?php
// Démarre la session
session_start();

// Détruit toutes les variables de session
session_unset();

// Détruit la session
session_destroy();

// Détruit le cookie de session
setcookie('PHPSESSID', '', time() - 3600);

// Redirige l'utilisateur vers la page de connexion
header('Location: connexion.php');
exit();
?>
