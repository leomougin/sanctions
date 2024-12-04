<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateAccount
{
    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        // L'entityManager est injecté par dépendance
        $this->entityManager = $entityManager;
    }
    // Cette méthode permettra d'éxécuter la user story
    public function execute(string $prenom,string $nom, string $email, string $password, string $passwordconf): User
    {
        $AccountRepository = $this->entityManager->getRepository(User::class);

        // Vérifier que les données sont présentes ( pas vide )
        // Si tel n'est pas le cas alors, lancer une exception
        if(empty($prenom)||empty($nom)||empty($email)||empty($password)){
            throw new \Exception("Tout les champs sont obligatoires");
        }

        // Vérifier si l'email est valide
        // Si tel n'est pas le cas alors, lancer une exception
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \Exception("L'adresse email n'est pas valide");
        }

        // Vérifier l'unicité de l'email
        // Si tel n'est pas le cas alors, lancer une exception
        if ($AccountRepository->findOneBy(['email'=>$email])) {
            throw new \Exception("L'email choisis est déjà existant");
        }

        // Vérifier que le mdp et que la confirmation du mdp soit identique
        // Si tel n'est pas le cas alors, lancer une exception
        if ($password != $passwordconf){
            throw new \Exception("Veuillez saisir le même mot de passe !");
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',$password))
        {
            throw new \Exception("Le mot de passe doit contenir au moins 8 caractères incluant une majuscule, une minuscule, et un chiffre!");
        }

        // Insérer les données dans la base de donnée
        // 1. Hasher le mot de passe
        $passwordHash= password_hash($password, PASSWORD_DEFAULT);

        // 2. Créer une instance de la classe User

        $user = new User();
        // Setters
        $user->setPrenom($prenom);
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setPassword($passwordHash);

        // 3. Persiste l'instance en utilisant l'entityManager

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Return de l'utilisateur créer
        return $user;

    }

}
