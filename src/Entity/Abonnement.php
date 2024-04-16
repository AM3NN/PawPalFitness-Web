<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement", indexes={@ORM\Index(name="id_salle", columns={"id_salle"})})
 * @ORM\Entity
 */
class Abonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_abonnement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAbonnement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="duree_abonnement", type="string", length=100, nullable=true)
     */
    private $dureeAbonnement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix_abonnement", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixAbonnement;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_deb_abonnement", type="date", nullable=true)
     */
    private $dateDebAbonnement;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin_abonnement", type="date", nullable=true)
     */
    private $dateFinAbonnement;

    /**
     * @var \SalleDeSport
     *
     * @ORM\ManyToOne(targetEntity="SalleDeSport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle", referencedColumnName="id_salle")
     * })
     */
    private $idSalle;

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
