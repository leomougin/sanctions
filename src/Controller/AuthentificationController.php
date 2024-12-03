<?php

namespace App\Controller;

use App\UserStory\CreateAccount;
use Doctrine\ORM\EntityManager;


class AuthentificationController extends AbstractController
{
    private array $auths =[];
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        session_start();
    }

    public function index():void
    {
        $this->render('auths/index',['auths'=>$this->auths]);
    }

    public function inscription():void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            print_r($_POST);
            $prenom= $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $mdp =$_POST['mdp'];
            $mdpconf =$_POST['mdpconf'];

            try {
                // Tenter de créer un compte
                $user = new CreateAccount($this->entityManager);
                $user->execute($prenom,$nom,$email, $mdp, $mdpconf);
                $_SESSION['inscription_success']="1";
                $this->redirect('/connexion');
            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }
        }
        $this->render('auths/inscription',['erreurs'=>$erreurs ?? null,]);
    }
    public function connexion(): void {
        $this->render('auths/connexion');
    }
}