<?php 
$title = 'Connexion';
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
                <label for="username" class="form-label">Username
                    <i class="fa-solid fa-user"></i>
                </label>
                <input type="text" class="form-control" name="username" id="username" placeholder="votre pseudo" value="<?= $username ?>" required>
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