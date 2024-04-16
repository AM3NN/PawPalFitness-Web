<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TravailleurRepository;

#[ORM\Entity(repositoryClass:TravailleurRepository::class)]
class Travailleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id=null;

    #[ORM\Column(length: 200)]
    private ?string $diplome;

    #[ORM\Column(length: 200)]
    private ?string $experience;

    #[ORM\Column(length: 200)]
    private ?string $langue;

    #[ORM\Column(length: 200)]
    private ?string $categorie;

    #[ORM\ManyToOne(targetEntity: Personne::class)]
    #[ORM\JoinColumn(name: "personne_id", referencedColumnName: "id")]
    private Personne $personne;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): static
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): static
    {
        $this->personne = $personne;

        return $this;
    }


}
