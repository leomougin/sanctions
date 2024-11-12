<?php

namespace App\Controller;

require_once __DIR__ . '/../vendor/autoload.php';

$route=$_GET['route'] ?? 'accueil';

switch ($route) {
    default:
    case 'accueil':
        $accueilController = new AccueilController();
        $accueilController->accueil();
        break;

    case 'mentionlegales':
        $mentionLegalesController = new MentionLegalesController();
        $mentionLegalesController->mentionLegales();
        break;
    case 'inscription':
        $inscriptionController = new CreateAccountController();
        $inscriptionController->inscription();
        break;
}