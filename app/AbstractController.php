<?php

abstract class AbstractController
{
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
}
