<?php

namespace App\Controller;

use Doctrine\ORM;
class AccueilController extends AbstractController
{

    // Méthode permettant de gérer la page d'accueil
    public function index():void
    {
        $this->render('home/accueil');
    }

    public function mentionlegal():void
    {
        $this->render('home/mentionlegal');
    }
}