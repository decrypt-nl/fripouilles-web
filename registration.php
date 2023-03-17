<?php

$status = null;
$prenom = null;
$nom = null;
$email = null;
$mdp = null;
$remdp = null;
$errors = [];

if(!empty($_POST)) {
    $status = htmlspecialchars($_POST['status']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $remdp = htmlspecialchars($_POST['remdp']);
    $mdp = sha1($mdp);
    $remdp = sha1($remdp);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "L'email est invalide.";
    }

    if($mdp !== $remdp) {
        $errors[] = "Les deux mots de passe ne correspondent pas !";
    }

    if(strlen($mdp) < 8 && strlen($remdp) < 8) 
    {
        $errors[] = "Votre mot de passe doit contenir au moins 8 caractères.";
    }

    if(empty($errors)) {
        
        try {
            $dbname = "fripouilles";
            $dbuser = "admfrip";
            $dbhost = "192.168.1.63";
            $dbpassword = "root";
            $bdd = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
        } catch (PDOException $e) {
            exit();
        }

        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $bdd->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch();

        if($user){
            $errors[] = "Cet e-mail est déjà utilisé.";
            header('registration.php');
        } else{
        $sql = $bdd->prepare('INSERT INTO users (status, nom, prenom, email, mdp) VALUES(:status, :nom, :prenom, :email, :mdp)'); 
        $sql->bindParam(':status', $status, PDO::PARAM_STR);
        $sql->bindParam(':nom', $nom, PDO::PARAM_STR);
        $sql->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $sql->execute();
        header('connexion.php');
        exit();
        }
    }
}
?>

<?php if (empty($errors)=== false) { ?>
    <div class="alert alert-danger"><?php foreach ($errors as $err) {echo($err);}?></div> 
<?php } ?>
<?php
$title = 'Inscription';
require_once('includes/header.php');
?>

<form method="POST">
    <div class="d-flex justify-content-center">
        <fieldset class="default-fieldset">
            <legend class="h1">Pour m'inscrire</legend>
            <h1 class="d-flex justify-content-center h3 text-primary">Inscription</h1>

            <div class="input-group">
                <div class="input-group-text">
                <label for="label-form" class="form-label">Assistante Maternelle</label>
                <input class="form-check-input" type="radio"  name="status" id="status" value="Assistante" aria-label="Radio button for following text input">
                ㅤㅤㅤㅤㅤㅤㅤ
                <label for="label-form" class="form-label">Parents</label>
                <input class="form-check-input" type="radio"  name="status" id="status" value="Parent" aria-label="Radio button for following text input">
                </div>
            </div>
            <div class="input-group">
                <div class="input-group-text">
                <label for="form-label" class="form-label">Nom</label>
                <input class="form-control" type="text" name="nom" id="nom">
                ㅤㅤㅤ
                <label for="form-label" class="form-label">Prénom</label>
                <input class="form-control" type="text" name="prenom" id="prenom">
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email 
                    <i class="fa-solid fa-envelope-circle-check bg-light"></i>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ex: totodu62@gmail.com" value="<?= $email ?>" required>
            </div>
            <div class="mb-4">
                <label for="mdp" class="form-label">Mot de passe
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Saisir un mot de passe"  required>
            </div>
            <div class="mb-4">
                <label for="remdp" class="form-label">Confirmer Mot de passe
                    <i class="fa-solid fa-lock"></i>
                </label>
                <input type="password" class="form-control" name="remdp" id="remdp" placeholder="Confirmez votre mot de passe" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn_envoye btn btn-success mb-3">Envoyer</button>
            </div>
        </fieldset>
    </div>
</form>
<?php
require_once('includes/footer.php');
?>