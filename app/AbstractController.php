<?php

abstract class AbstractController
{
    public function __construct() 
    {
        session_start();
    }

    public function getRepository(string $repoName): AbstractRepository
    {
        require_once(ROOT.'models/'.$repoName.'.php');
        
        return new $repoName();
    }
   
    public function render(string $file, array $data = []): void
    {
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        require_once(ROOT.'views/'.$file.'.php');

        // On stocke le contenu dans $mainContainer
        $mainContainer = ob_get_clean();

        require_once(ROOT.'views/base.php');
    }

    public function redirectToRoute(string $route) : void
    {
        header("Location: http://diabs.localhost/". $route);
        exit();
    }

    public function createNotif($message, $type) : void
    {
        $_SESSION['notif'] = array(
            'messages'=> $message,
            'type'    => $type,
        );
    }
}
