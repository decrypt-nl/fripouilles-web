<?php 
$title = 'Inscription réussie';
 ?>
Merci de votre inscription ! Amusez-vous bien :)
<script>
        const divAlert = document.getElementById("alert-notif"); 
        if(divAlert) {
            setTimeout(() => {
                divAlert.remove();
            },("divAlert", "5000")); 
        }
    </script>