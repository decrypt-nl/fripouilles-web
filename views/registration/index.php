<?php 
$title = 'Inscription';
 ?>
<?php if (empty($errors)=== false) { ?>
    <div class="alert alert-danger"><?php foreach ($errors as $err) {echo($err);}?></div> 
<?php } ?>

<form method="POST">
    <div class="d-flex justify-content-center">
        <fieldset class="default-fieldset">
            <legend class="h1">Pour m'inscrire</legend>
            <h1 class="d-flex justify-content-center h3 text-primary">Inscription</h1>

            <div class="mb-3">
                <label for="username" class="form-label">Username
                    <i class="fa-solid fa-user"></i>
                </label>
                <input type="text" class="form-control" name="username" id="username" placeholder="ex: totodu62" value="<?= $username ?>" required>
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