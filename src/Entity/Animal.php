<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnimalRepository;

#[ORM\Entity(repositoryClass:AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $ida=null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Vous devez mettre le nom de votre animal!!!")]
    private ?string $nom=null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Vous devez mettre l'age!!!")]
    private ?int $age=null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank(message: "Vous devez choisir la categorie!!!")]
    private ?string $categorie=null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Vous devez mettre le type!!!")]
    private ?string $type=null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: "Vous devez mettre les details!!!")]
    private ?string $details=null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Vous devez mettre le poids!!!")]
    private ?float $poids=null;

    public function getIda(): ?int
    {
        return $this->ida;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): static
    {
        $this->details = $details;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }


}