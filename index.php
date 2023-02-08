<?php

// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require_once(ROOT.'app/AbstractRepository.php');
require_once(ROOT.'app/AbstractController.php');
require_once(ROOT.'app/TemplateHelper.php');

// On extrait les paramètres de l'url
$params = explode('/', $_GET['p']);

if($params[0] != ""){
    // 1er paramètre : le nom du controller
    $controller = ucfirst($params[0]).'Controller';
    // 2e paramètre : le nom de la fonction a appelé dans le controller
    // Si il n'existe pas, on invoque la fonction index par defaut
    $action = isset($params[1]) ? $params[1] : 'index'; 

    // Init du controller demandé
    require_once(ROOT.'controllers/'.$controller.'.php');
    $controller = new $controller();

    if(method_exists($controller, $action)){
        // On delete les 2 premiers paramètres qui représente le controller et potentiellement la méthode
        unset($params[0]);
        unset($params[1]);

        // La fonction du controller peut maintenant être appelée en incluant les paramètres si il y a
        call_user_func_array([$controller, $action], $params);
    }else{
        // Si la méthode du controller n'existe on renvoie une 404
        http_response_code(404);
        echo 'La page recherchée n\'existe pas';
    }
}else{
    // Si l'url ne contient aucun paramètres alors on affiche la page d'accueil
    require_once(ROOT.'controllers/HomeController.php');
    $controller = new HomeController();
    $controller->index();
}
