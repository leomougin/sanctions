<?php

namespace App\Controller;
use App\UserStory\CreateAccount;
class CreateAccountController{

    // Méthode permettant de gérer la page d'inscription
    public function inscription()
    {

        $entityManager = require_once __DIR__ . '/../../config/bootstrap.php' ?: die("Erreur de chargement du fichier bootstrap.php");
            // Fait appel au modèle afin de récupérer les données dans la BDD
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                // Il ne faut pas un $this-> avant le entityManager
                $createAccount = new CreateAccount($entityManager);
                $createAccount->execute($_POST['prenom'],$_POST['nom'], $_POST['email'], $_POST['mdp'],$_POST['mdpconf']);

                // Redirection
//                session_start();
//                $_SESSION['InscriptionReussite']='Inscription réussite';
//                header('Location : index.php?route=accueil');
//                exit();
            } catch
            (\Exception $e) {
                $erreur= $e->getMessage();
            }
        }

            // Fait appel à la vue afin de renvoyer la page
            require_once __DIR__ . '/../../vue/_parts/header.php';
            require_once __DIR__ . '/../../vue/Vue_CreateAccount.php';
            require_once __DIR__ . '/../../vue/_parts/footer.php';
    }
}