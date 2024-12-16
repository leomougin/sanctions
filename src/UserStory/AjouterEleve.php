<?php

namespace App\UserStory;


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

    public function execute($fichierCsv, $idPromotion)
    {
        $repositoryPromotion = $this->entityManager->getRepository(Promotion::class);

        if(empty($fichierCsv) || empty($idPromotion)){
            throw new Exception("Tous les champs sont obligatoires!");
        }

        if (!$repositoryPromotion->findOneBy(['id'=>$idPromotion])){
            throw new \Exception("La promotion sélectionnée n'a pas été trouvée !");
        }



        $csv= Reader::createFromPath($fichierCsv);
        $csv ->setHeaderOffset(0);
        $csv->setEscape('');
        $res= iterator_to_array($csv);
        foreach ($res as $etudiant) {
            $eleve = new Eleve();
            $eleve->setNom($etudiant["Nom"]);
            $eleve->setPrenom($etudiant["Prénom"]);
            $eleve->setIdPromotion($repositoryPromotion->findOneBy(['id'=>$idPromotion]));
            $this->entityManager->persist($eleve);
            $this->entityManager->flush();
        }
        return "Les étudiants ont bien étés créés !";

    }
    public function getPromotion()
    {
        $repository =  $this->entityManager->getRepository(Promotion::class);
        return $repository->findAll();
    }

}