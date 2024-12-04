<?php

namespace App\UserStory;

use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;

class AjouterPromotion
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
    public function execute (string $nom, int $annee):Promotion
    {
        //$AccountRepository = $this->entityManager->getRepository(Promotion::class);

        if(empty($nom)|| empty($annee)){
            throw new \Exception("Tout les champs sont obligatoires!");
        }

        if (!preg_match('/^(?=.*\d)/',$annee))
        {
            throw new \Exception("Veuillez indiquer une année valide!");
        }

        $promotion = new Promotion();
        $promotion->setNom($nom);
        $promotion->setAnnee($annee);

        $this->entityManager->persist($promotion);
        $this->entityManager->flush();

        return $promotion;
    }
}