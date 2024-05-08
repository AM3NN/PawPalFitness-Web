<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\AbonnementRepository;
use DateTime;

#[ORM\Entity(repositoryClass:AbonnementRepository::class)]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idAbonnement=null;

    #[ORM\Column(length: 255)]
    private ?string $dureeAbonnement=null;


    #[ORM\Column]
    private ?float $prixAbonnement=null;

    #[ORM\Column]
    private ?DateTime $dateDebAbonnement;

    #[ORM\Column]
    private ?DateTime $dateFinAbonnement;

    #[ORM\ManyToOne(inversedBy: "abonnements")]
    private ?SalleDeSport $idSalle;

    public function getIdAbonnement(): ?int
    {
        return $this->idAbonnement;
    }

    public function getDureeAbonnement(): ?string
    {
        return $this->dureeAbonnement;
    }

    public function setDureeAbonnement(string $dureeAbonnement): static
    {
        $this->dureeAbonnement = $dureeAbonnement;

        return $this;
    }

    public function getPrixAbonnement(): ?float
    {
        return $this->prixAbonnement;
    }

    public function setPrixAbonnement(float $prixAbonnement): static
    {
        $this->prixAbonnement = $prixAbonnement;

        return $this;
    }

    public function getDateDebAbonnement(): ?\DateTimeInterface
    {
        return $this->dateDebAbonnement;
    }

    public function setDateDebAbonnement(\DateTimeInterface $dateDebAbonnement): static
    {
        $this->dateDebAbonnement = $dateDebAbonnement;

        return $this;
    }

    public function getDateFinAbonnement(): ?\DateTimeInterface
    {
        return $this->dateFinAbonnement;
    }

    public function setDateFinAbonnement(\DateTimeInterface $dateFinAbonnement): static
    {
        $this->dateFinAbonnement = $dateFinAbonnement;

        return $this;
    }

    public function getIdSalle(): ?SalleDeSport
    {
        return $this->idSalle;
    }

    public function setIdSalle(?SalleDeSport $idSalle): static
    {
        $this->idSalle = $idSalle;

        return $this;
    }


    public function getIdAbonnement(): ?int
    {
        return $this->idAbonnement;
    }

    public function getDureeAbonnement(): ?string
    {
        return $this->dureeAbonnement;
    }

    public function setDureeAbonnement(?string $dureeAbonnement): static
    {
        $this->dureeAbonnement = $dureeAbonnement;

        return $this;
    }

    public function getPrixAbonnement(): ?float
    {
        return $this->prixAbonnement;
    }

    public function setPrixAbonnement(?float $prixAbonnement): static
    {
        $this->prixAbonnement = $prixAbonnement;

        return $this;
    }

    public function getDateDebAbonnement(): ?\DateTimeInterface
    {
        return $this->dateDebAbonnement;
    }

    public function setDateDebAbonnement(?\DateTimeInterface $dateDebAbonnement): static
    {
        $this->dateDebAbonnement = $dateDebAbonnement;

        return $this;
    }

    public function getDateFinAbonnement(): ?\DateTimeInterface
    {
        return $this->dateFinAbonnement;
    }

    public function setDateFinAbonnement(?\DateTimeInterface $dateFinAbonnement): static
    {
        $this->dateFinAbonnement = $dateFinAbonnement;

        return $this;
    }

    public function getIdSalle(): ?SalleDeSport
    {
        return $this->idSalle;
    }

    public function setIdSalle(?SalleDeSport $idSalle): static
    {
        $this->idSalle = $idSalle;

        return $this;
    }


}
