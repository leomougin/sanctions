<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name:'eleve')]

class Eleve
{

    #[ORM\Id]
    #[ORM\Column(name:'id_eleve',type:'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(name:'nom_eleve', type:'string',length:50)]
    private string $nom;
    #[ORM\Column(name:'prenom_eleve', type:'string',length:50)]
    private string $prenom;
    #[ORM\JoinColumn(name:'id_promotion', referencedColumnName:'id_promotion')]
    #[ORM\ManyToOne(targetEntity: Promotion::class)]
    private ?Promotion $id_promotion;

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

    public function getIdPromotion(): ?Promotion
    {
        return $this->id_promotion;
    }

    public function setIdPromotion(?Promotion $id_promotion): void
    {
        $this->id_promotion = $id_promotion;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }


}