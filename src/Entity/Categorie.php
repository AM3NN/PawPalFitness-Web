<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;


#[ORM\Entity(repositoryClass:CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idc=null;

    #[ORM\ManyToOne(targetEntity: Animal::class)]
    #[ORM\JoinColumn(name: "IDA", referencedColumnName: "ida")]
    private Animal $ida;

    #[ORM\ManyToOne(targetEntity: Personne::class)]
    #[ORM\JoinColumn(name: "IDU", referencedColumnName: "id")]
    private Personne $idu;

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function getIda(): ?Animal
    {
        return $this->ida;
    }

    public function setIda(?Animal $ida): static
    {
        $this->ida = $ida;

        return $this;
    }

    public function getIdu(): ?Personne
    {
        return $this->idu;
    }

    public function setIdu(?Personne $idu): static
    {
        $this->idu = $idu;

        return $this;
    }


}
