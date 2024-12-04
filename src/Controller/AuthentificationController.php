<?php

namespace App\Controller;

use App\UserStory\CreateAccount;
use App\UserStory\Login;
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

        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
//        if(!isset($_SESSION['prenom'])) {
//            $this->redirect('/error');
//        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $email= $_POST['email'];
            $mdp = $_POST['mdp'];

            try{
                $user = new Login($this->entityManager);
                $user->execute($email, $mdp);
                $_SESSION['connexion_success']="1";
                $this->redirect('/');
            }catch(\Exception $e )
            {
                $erreurs = $e->getMessage();
            }
        }

        $this->render('auths/connexion',['erreurs'=>$erreurs ?? null,]);
    }

    public function deconnexion():void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION['utilisateur']=null;
            session_destroy();
            $this->redirect('/');
        }
        if (session_status() === PHP_SESSION_NONE) {

            $this->redirect('/error');
        }
        $this->render('auths/deconnexion');
    }
}