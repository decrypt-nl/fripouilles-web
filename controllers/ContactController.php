<?php

class ContactController extends AbstractController
{
    public function index(): void
    {
        $email   = null;
        $message = null;
        $errors  = [];

        if(!empty($_POST))
        {
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                $errors[] = "EMAIL INVALIDE !!!";
            if (strlen($message) < 10)
                $errors[] = "MINIMUM 10 CARACTERES !!!";

            if(empty($errors))
            {
                /** @var ContactRepository */
                $contactRepo = $this->getRepository(ContactRepository::class);
                $result = $contactRepo->insertContact([
                    'email'   => $email,
                    'message' => $message
                ]);
                
                if($result === false){
                    $errors[] = 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer plus tard';
                } else {
                    $this->createNotif('Merci pour votre soutien', 'success');
                    $this->redirectTORoute("contact/merci");
                    exit();
                }
            }
        }

        $this->render('contact/index', [
            'email'   => $email,
            'message' => $message,
            'errors'  => $errors,
        ]);
    }

    public function merci(): void
    {
        $this->render('contact/form-merci');
    }

    public function messages(): void
    {
        // repository
        $contactRepo = $this->getRepository(ContactRepository::class);
        // findAll
        $messages = $contactRepo->findAll();
        // render
        $this->render('contact/messages', [
            'messages' => $messages,
        ]);
    }

    public function delete(int $id): void
    {
        // repository
        $contactRepo = $this->getRepository(ContactRepository::class);
        // findOne
        $messages = $contactRepo->findOne($id);
        // Si findOne ne trouve rien
        if(empty($messages)) {
            // -> on renvoie sur la page mesMessages
            $this->redirectToRoute("contact/messages");
            exit();
        }
        
        $contactRepo->delete($id);
        $this->createNotif('Utlisateur supprimé', 'success');
        $this->redirectToRoute("contact/messages");
        exit();
    }
}