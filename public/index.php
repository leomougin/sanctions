<?php

namespace App\Controller;

require_once __DIR__ . '/../vendor/autoload.php';

$route=$_GET['route'] ?? 'accueil';

switch ($route) {
    default:
        $accueilController = new AccueilController();
        $accueilController->accueil();
        break;

}