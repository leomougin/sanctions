<?php

namespace App\Controller;

require_once __DIR__ . '/../vendor/autoload.php';
$entityManager=require_once __DIR__."/../config/bootstrap.php";

// Récupération des routes
$route= require_once __DIR__ . '/../config/routes.php';

// Récupération de l'URL
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if (!isset($route[$uri])) {
    $errorController = new ErrorController();
    $errorController ->error404();
    exit();
}

[$controllerName, $action]=$route[$uri];
$controllerClass="App\\Controller\\{$controllerName}";
try{
    $controller=new $controllerClass($entityManager);
    $controller->$action();
}catch (\Exception $e){
    error_log($e->getMessage());
    $errorController = new ErrorController();
    $errorController->error404();
}