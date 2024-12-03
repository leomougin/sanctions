<?php

namespace App\UserStory;

use Doctrine\ORM\EntityManager;
use App\Entity\User;

Class Login
{
    private EntityManager $entityManager;
    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(string $email, string $password)
    {
        $AccountRepository = $this->entityManager->getRepository(User::class);

        // Vérifier que tous les champs sont remplis
        if(empty($email) || empty($password)){
            throw new \Exception('Tous les champs sont obligatoires !');
        }

        // Vérifier que l'email correspond bien à un compte
        if (!$AccountRepository->findOneBy(['email'=>$email]) || !password_verify($password,$AccountRepository->findOneBy(['email'=>"$email"])->getPassword())) {
            throw new \Exception("Les informations saisies sont incorrectes !");
        }

        // Ajout des informations de l'utilisateur
        $_SESSION["utilisateur"]=[
            "email" => $email,
            "prenom" => $AccountRepository->findOneBy(["email"=>$email])->getPrenom(),
            "nom" => $AccountRepository->findOneBy(["email"=>$email])->getNom()
        ];
    }
}