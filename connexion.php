<?php
$errors = [];
session_start(); //démarrer la session

if(isset($_SESSION["email"])) {
    header("Location: accueil.php");
    exit();
}
require_once('config.php');

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs email et mot de passe sont vides
    if(empty(trim($_POST["email"])) || empty(trim($_POST["mdp"]))) {
        $errors[] = "Veuillez entrer un email et un mot de passe.";
    } else {
        // Appeler la procédure stockée pour récupérer les informations de l'utilisateur
        $sql = "CALL login(:email, :mdp)";

        if($stmt = $bdd->prepare($sql)) {
            // Liaison des variables à la requête préparée en tant que paramètres
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":mdp", $param_password, PDO::PARAM_STR);

            // Définir les paramètres
            $param_email = trim($_POST["email"]);
            $param_password = $_POST["mdp"];

            // Exécution de la requête préparée
            if($stmt->execute()) {
                // Récupérer le résultat de la requête
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Vérifier si l'email existe dans la base de données
                if($row) {
                    // Démarrer une nouvelle session
                    session_start();

                    // Stocker les données de l'utilisateur dans la session
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["prenom"] = $row["prenom"];
                    $_SESSION["nom"] = $row["nom"];
                    $_SESSION["enfant"] = $row["enfant"];

                    // Rediriger l'utilisateur vers la page d'accueil
                    header("Location: accueil.php");
                    exit();
                } else {
                    // Afficher un message d'erreur si l'email ou le mot de passe est incorrect
                    $errors[] =  "L'email ou le mot de passe est incorrect.";
                }
            } else {
                $errors[] = "Oops! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }

            // Fermer la requête préparée
            unset($stmt);
        }
    }

    // Fermer la connexion à la base de données
    $bdd = null;
}

?>
<?php if (empty($errors)=== false) { ?>
    <div class="alert alert-danger"><?php foreach ($errors as $err) {echo($err);}?></div> 
<?php } ?>
<?php 
$title = 'Connexion';
require_once('includes/header.php');
?>

<form method="POST">
    <div class="d-flex justify-content-center">
        <fieldset class="default-fieldset">
            <legend class="h1">Pour me connecter</legend>
            <h1 class="d-flex justify-content-center h3 text-primary">Connexion</h1>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email
                    <i class="fa-solid fa-user"></i>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Saisir votre email" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Saisir votre mot de passe" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn_envoye btn btn-success mb-3">Me connecter</button>
            </div>
            <a href="#" class="link-primary mb-2">Mot de passe oublié ?</a>
        </fieldset>
    </div>
</form>
<?php 
require_once('includes/footer.php');
?>