<?php  

class ConnexionController extends AbstractController 
{
    public function index() :void 
    {  
        $username = null;
        $errors = [];

        if(isset($_SESSION['user'])) 
        {
            $this->redirectToRoute("connexion");
        }

        if(!empty($_POST)) {
        
            $username = htmlspecialchars($_POST['username']);
            $mdp = htmlspecialchars($_POST['mdp']);

            if(!isset($username)) 
                {
                    $errors[] = "Erreur réessayer plus tard.";
                    $this->redirectToRoute("connexion");
                }
               
                $mdpHash = password_hash($mdp, PASSWORD_BCRYPT);

                if(!password_verify($mdp, $mdpHash)) 
                {
                    $errors[] = "Username ou mot de passe invalide";
                    $this->redirectToRoute("connexion");
                }

            if(empty($errors)) 
            {
                /** @var ConnexionRepository */
                $connexionRepo = $this->getRepository(ConnexionRepository::class);
                $result = $connexionRepo->getUserByUsername([
                    'username' => $username,
                    'mdp'      => $mdpHash,
                ]);

                if($result === false) {   
                    $errors[] = 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer plus tard';
                } else {
                    $this->createNotif('Connexion réussie', 'success');
                    $this->redirectToRoute("home");
                    exit();
                }

                if($_SESSION['user']) 
                {
                    $this->redirectToRoute("home");
                }
            }
        }

        $this->render('connexion/index', [
            'username' => $username,
            'errors'   => $errors,
        ]);
    }
}
