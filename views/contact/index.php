<?php $title = 'Contact'; ?>

<?php if (empty($errors)=== false) { ?>
    <div class="alert alert-danger"><?php foreach ($errors as $err) {echo($err);}?></div> 
<?php } ?>
   
<form method="POST">
    <div class="d-flex justify-content-center">
        <fieldset class="default-fieldset">
            <legend class="h1"> Formulaire de contact</legend>
            <h1 class="d-flex justify-content-center h3 text-primary">Pour me contacter !</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email address
                    <i class="fa-solid fa-envelope-circle-check bg-light"></i>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?= $email ?>" required>
            </div>
            <div class="mb-4">
                <label for="control-textarea" class="form-label">Votre avis sur le jeu</label>
                <textarea class="form-control" name="message" required id="control-textarea" rows="5" placeholder="Tout conseils sera important pour nous à l'avenir des futurs jeux !"><?= $message ?></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn_envoye btn btn-success mb-3">Envoyer</button>
            </div>
        </fieldset>
    </div>
</form>