<?php

class RegistrationController extends AbstractController
{
    public function index(): void
    {
        $username = null;
        $mdp = null;
        $remdp = null;
        $errors = [];
       

        if(!empty($_POST)) {

            $username = htmlspecialchars($_POST['username']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $remdp = htmlspecialchars($_POST['remdp']);

            if($mdp !== $remdp) {
                $errors[] = "Les deux mots de passe ne correspondent pas !";
            }

            $mdpHash = password_hash($mdp, PASSWORD_BCRYPT);

            if (strlen($username) < 3) 
            {
                $errors[] = "Votre username doit contenir au moins 3 caractères.";
            }
            if(!password_verify($mdp, $mdpHash)) 
            {
                $errors[] = "Erreur Username ou Mot de passe invalide";
            }

            if(empty($errors)) {
                /** @var RegistrationRepository */
                $registrationRepo = $this->getRepository(RegistrationRepository::class);
                $result = $registrationRepo->insertUser([
                    'username' => $username,
                    'mdp'  => $mdpHash,
                ]);

                if($result === false)
                {
                    $errors[] = 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer plus tard';
                } else {
                    $this->createNotif('Inscription réussie', 'success');
                    $this->redirectToRoute("registration/complete");
                    exit();
                }
            }
        }
        $this->render('registration/index', [
            'username' => $username,
            'errors'   => $errors,
        ]);
    }

    public function complete(): void
    {
        $this->render('registration/registration-complete');
    }
}
