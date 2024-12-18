<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:'promotions')]

class Promotion
{
    #[ORM\Id]
    #[ORM\Column(name:'id_promotion', type:'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(name:'nom_promotion', type:'string',length:50)]
    private string $nom;
    #[ORM\Column(name:'annee_promotion', type:'integer',length:4)]
    private string $annee;
    private $entityManager;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): void
    {
        $this->annee = $annee;
    }

}
