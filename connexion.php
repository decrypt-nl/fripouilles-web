<?php
$email = null;
$password = null;
$errors = [];

session_start();

if(!empty($_POST)) {

if (isset($_SESSION['id_utilisateur']) && isset($_SESSION['email'])) {

    header('accueil.php');
    exit();
}

if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && sha1($password) === $user['mot_de_passe']) {

        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
        $_SESSION['email'] = $user['email'];

        // Crée un cookie pour l'utilisateur
        setcookie('id_utilisateur', $user['id_utilisateur'], time() + 3600, '/');
        setcookie('email', $user['email'], time() + 3600, '/');

        // Redirige l'utilisateur vers la page d'accueil
        header('accueil.php');
        exit();
    } else {
       $errors[] = 'Adresse e-mail ou mot de passe incorrect.';
    }
}
}
?>

<?php 
$title = 'Connexion';
require_once('includes/header.php');
?>
 
<?php if (empty($errors)=== false) { ?>
    <div class="alert alert-danger"><?php foreach ($errors as $err) {echo($err);}?></div> 
<?php } ?>

<form method="POST">
    <div class="d-flex justify-content-center">
        <fieldset class="default-fieldset">
            <legend class="h1">Pour me connecter</legend>
            <h1 class="d-flex justify-content-center h3 text-primary">Connexion</h1>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email
                    <i class="fa-solid fa-user"></i>
                </label>
                <input type="email" class="form-control" name="email" id="username" placeholder="Saisir votre email" value="<?= $email ?>" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Saisir votre mot de passe" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Se souvenir de moi
                </label>
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
