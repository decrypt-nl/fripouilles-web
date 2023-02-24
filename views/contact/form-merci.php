<?php $title = 'Page de remerciements'; ?>

<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Merci beaucoup pour votre soutien !</h4>
    <p>Je me ferai un plaisir de les lire, je vous recontacterai un jour peut-être pour vous répondre à vos conseils.</p>
    <hr>
    <p class="mb-0">Pour vous rediriger vers la page d'acceuil et battre un nouveau record clique sur le bouton juste en dessous ! <i class="fa-regular fa-face-kiss-wink-heart"></i></p>
</div>
<a class="btn btn-info btn-sm" href="<?= TemplateHelper::urlPath('home') ?>" role="button">CLIQUE MOI !!!<img src="<?= TemplateHelper::assetPath('images/catcute.png') ?>" alt="bootstrap" class="img-circle"><a>
<script>
        const divAlert = document.getElementById("alert-notif"); 
        if(divAlert) {
            setTimeout(() => {
                divAlert.remove();
            },("divAlert", "5000")); 
        }
    </script>