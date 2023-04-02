<?php
session_start();

if (isset($_SESSION["email"])) {
    header("Location: accueil.php");
    exit;
}

$status = null;
$prenom = null;
$nom = null;
$email = null;
$mdp = null;
$remdp = null;
$enfant = null;
$erreurs = [];
$success = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $status = $_POST['status'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $remdp = htmlspecialchars($_POST['remdp']);
    $enfant = $_POST['enfant'];

    // Validation des champs du formulaire
    if(!empty($_POST)) {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $erreurs[] = "L'email est invalide.";
    }
    if (empty($mdp)) {
        $erreurs[] = "Le mot de passe est obligatoire";
    }
    if (!in_array($status, array('Assistante', 'Parent', 'Autre'))) {
        $erreurs[] = "Le statut est invalide";
    }
    if (!is_numeric($enfant) || $enfant < 0) {
        $erreurs[] = "Le nombre d'enfants est invalide";
    }
    if($mdp !== $remdp) {
        $erreurs[] = "Les deux mots de passe ne correspondent pas !";
    }

    if(strlen($mdp) < 8 && strlen($remdp) < 8) 
    {
        $erreurs[] = "Votre mot de passe doit contenir au moins 8 caractères.";
    }

    }
    // Si le formulaire est valide, insérer les données dans la base de données
    if (empty($erreurs)) {
        // Hacher le mot de passe avec sha1
        $mdp_hache = sha1($mdp);

        // Connexion à la base de données avec PDO

        $host = '172.23.10.25';
        $dbname = 'fripouilles'; 
        $username = 'admfrip'; 
        $password = 'root'; 

        try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            // Vérifier si l'email est déjà utilisé
            $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            if ($result > 0) {
                $erreurs[] = "Cet email est déjà utilisé";
            } else {
                // Insérer les données dans la table utilisateurs avec une procédure stockée
                $stmt = $conn->prepare("CALL insert_utilisateur(:status, :nom, :prenom, :email, :mdp, :enfant)");
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':mdp', $mdp_hache);
                $stmt->bindParam(':enfant', $enfant);
                $stmt->execute();
                echo "L'inscription a été enregistrée avec succès.";
            }
        }
        catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}
$title = 'Inscription';
require_once('includes/header.php');
?>
<?php
// Afficher les erreurs du formulaire
if (!empty($erreurs)) { ?>
    <div class="alert alert-danger"><?php foreach ($erreurs as $erreur) {echo($erreur);} ?></div>
<?php } ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="d-flex justify-content-center">
        <fieldset class="default-fieldset">
            <legend class="h1">Pour m'inscrire</legend>
            <h1 class="d-flex justify-content-center h3 text-primary">Inscription</h1>

            <div class="input-group">
                <div class="input-group-text">
                <label for="label-form" class="form-label">Assistante Maternelle</label>
                <input class="form-check-input" type="radio"  name="status" id="status" value="Assistante" value="autre" <?php if (isset($status) && $status === "Assistante") echo "checked"; ?>aria-label="Radio button for following text input" checked required>
                ㅤㅤㅤㅤㅤ
                <label for="label-form" class="form-label">Parent</label>
                <input class="form-check-input" type="radio"  name="status" id="status" value="Parent" value="autre" <?php if (isset($status) && $status === "Parent") echo "checked"; ?> aria-label="Radio button for following text input" required>
                ㅤㅤㅤㅤㅤㅤ
                <label for="label-form" class="form-label">Autres</label>
                <input class="form-check-input" type="radio"  name="status" id="status" value="Autre" value="autre" <?php if (isset($status) && $status === "Autre") echo "checked"; ?> aria-label="Radio button for following text input" required>
                </div>
            </div>
            <div class="input-group">
                <div class="input-group-text">
                <label for="form-label" class="form-label">Nom</label>
                <input class="form-control" type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" required>
                ㅤㅤㅤ
                <label for="form-label" class="form-label">Prénom</label>
                <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($_POST['prenom'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="mb-0">
                <label for="enfant" class="form-label">Nombre d'enfants ?</label>
                <input type="number" class="form-control" name="enfant" id="enfant" value="<?php echo htmlspecialchars($_POST['enfant'] ?? ''); ?>" placeholder="Mettez 0 si vous n'avez pas d'enfants" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email 
                    <i class="fa-solid fa-envelope-circle-check bg-light"></i>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ex: totodu62@gmail.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>
            <div class="mb-4">
                <label for="mdp" class="form-label">Mot de passe
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Saisir un mot de passe" required>
            </div>
            <div class="mb-4">
                <label for="remdp" class="form-label">Confirmer Mot de passe
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" class="form-control" name="remdp" id="remdp" placeholder="Confirmez votre mot de passe" required>
            </div>

            <div class="input-group fs-6">
                <div class="input-group-text">
                <input class="form-check-input mt-0" type="checkbox" value="check" aria-label="Checkbox for following text input" required>
                </div>
                <label for="mentions-legales" class="form-label"><a href="mentions-legales.php">J'accepte les mentions légales</a></label>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn_envoye btn btn-success mb-3">Envoyer</button>
            </div>
            <p class="fs-6 text-start">Dans le cadre de l'usage de données à caractère nominatif,</p>
            <p>que nous puissions utiliser vos données conformément à nos mentions légales.</p>
        </fieldset>
    </div>
</form>
<?php
require_once('includes/footer.php');


