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
            if (strlen($message) < 3)
                $errors[] = "MINIMUM 3 CARACTERES !!!";

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
                    header("Location:contact/merci");
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

    public function mesMessages(): void
    {
        // repository

        // findAll

        // render
    }

    public function deleteMessage(int $id): void
    {
        // repository

        // findOne

        // Si findOne ne trouve rien
        // -> on renvoie sur la page mesMessages

        // Si ok
        // -> on delete (voir AbstratcRepository)
    }
}
