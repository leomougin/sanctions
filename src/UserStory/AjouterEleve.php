<?php

namespace App\UserStory;

use App\Entity\Eleve;
use App\Entity\Promotion;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use League\Csv\Exception;
use League\Csv\InvalidArgument;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\UnavailableStream;


class AjouterEleve
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute($fichierCSV,$idPromotion)
    {
        $repositoryPromotion = $this->entityManager->getRepository(Promotion::class);

        if(empty($fichierCSV) || empty($idPromotion)){
            throw new Exception("Tous les champs sont obligatoires!");
        }
        if (!$repositoryPromotion->findOneBy([$idPromotion])){
            throw new \Exception("La promotion sélectionnée n'a pas été trouvée !");
        }
        $csv = Reader::createFromPath($fichierCSV,'r');
        $csv ->setHeaderOffset(0);
        $csv->setEscape('');
        $res= iterator_to_array($csv);
        foreach ($res as $etudiant) {
            $eleve = new Eleve();
            $eleve->setNom($etudiant["Nom"]);
            $eleve->setPrenom($etudiant["Prénom"]);
            $eleve->setIdPromotion($idPromotion);
            $this->entityManager->persist($eleve);
            $this->entityManager->flush();
        }
        return "Les étudiants ont bien étés créés !";
    }


}