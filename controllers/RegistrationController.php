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

            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
            if (strlen($username) < 3) {
                $errors[] = "Votre username doit contenir au moins 3 caractères.";
            }
            if(!password_verify($mdp, $mdpHash)) {
                $errors[] = "Erreur Username ou Mot de passe invalide";
            }

            if($mdp !== $remdp) {
                $errors[] = "Les deux mots de passe ne correspondent pas !";
            }
            if(empty($errors)) {
                /** @var RegistrationRepository */
                $connexionRepo = $this->getRepository(RegistrationRepository::class);
                $result = $connexionRepo->insertUser([
                    'username' => $username,
                    'mdp'      => $mdpHash,
                ]);
            }
        }
        $this->render('registration/index', [
            'username' => $username
        ]);
    }

    public function complete(): void
    {
        $this->render('registration/registration-complete');
    }
}
