<?php
// Inclusion du fichier config.php pour la connexion à la base de données
require_once 'config.php';

// Vérification si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit();
}

// Récupération des données de l'utilisateur
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $bdd->prepare($query);
$stmt->execute([$email]);
$user = $stmt->fetch();

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données soumises
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Validation des données soumises
    $errors = [];
    if (empty($email)) {
        $errors[] = "Veuillez saisir votre email.";
    }
    if (empty($nom)) {
        $errors[] = "Veuillez saisir votre nom.";
    }
    if (empty($prenom)) {
        $errors[] = "Veuillez saisir votre prénom.";
    }

    // Si toutes les données sont valides, mise à jour en base de données
    if (empty($errors)) {
        $query = "UPDATE users SET email = ?, mdp = ?, nom = ?, prenom = ? WHERE email = ?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$email, $password, $nom, $prenom, $_SESSION['email']]);

        // Mise à jour de la variable de session avec le nouvel email de l'utilisateur
        $_SESSION['email'] = $email;

        header("Location: accueil.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modification</title>
</head>
<body>
    <h1>Modification de profil</h1>
    <p>Modifier vos informations personnelles :</p>
    <form method="post">
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email'] ?>">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $user['nom'] ?>">
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom'] ?>">
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>
