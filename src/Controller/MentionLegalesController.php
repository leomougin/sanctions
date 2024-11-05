<?php

namespace App\Controller;
class MentionLegalesController
{
    // Méthode permettant de gérer la page d'accueil
    public function mentionlegales() {
        // Fait appel au modèle afin de récupérer les données dans la BDD

        // Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ .'/../../vue/_parts/header.php';
        require_once __DIR__ . '/../../vue/Vue_MentionLegales.php';
        require_once __DIR__ .'/../../vue/_parts/footer.php';


    }
}