<?php

namespace App\Controller;

use App\UserStory\AjouterPromotion;
use Doctrine\ORM\EntityManager;

class ClasseController extends AbstractController
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        session_start();
    }

    public function ajouterpromotion():void
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['promotion'];
            $annee = $_POST['annee'];

            try {
                $promotion = new AjouterPromotion($this->entityManager);
                $promotion->execute($nom, $annee);
                //$this->redirect('/');
            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }
            $this->render('classe/ajouterpromotion');
        }
    }
}