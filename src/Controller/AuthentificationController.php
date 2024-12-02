<?php

namespace App\Controller;

use App\UserStory\CreateAccount;



class AuthentificationController extends AbstractController
{
    private array $auths =[];
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['auths'])) {
            $_SESSION['auths']=[];
        }
        $this->auths=&$_SESSION['auths'];
    }

    public function index():void
    {
        $this->render('auths/index',['auths'=>$this->auths]);
    }

    public function inscription():void
    {
        $entityManager=require_once __DIR__."/../../config/bootstrap.php";
        $erreurs="";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp =$_POST['mdp'];
            $mdpconf =$_POST['mdpconf'];

            try {
                // Tenter de créer un compte
                $user = new CreateAccount($entityManager);
                $user->execute($nom,$prenom, $email, $mdp, $mdpconf);
                $this->redirect('/connexion');
            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }

        }
        $this->render('auths/inscription',['erreurs'=>$erreurs]);
    }
    public function connexion(): void {
        $this->render('auths/connexion');
    }
}