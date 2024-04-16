<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idP", type="integer", nullable=true)
     */
    private $idp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idU", type="integer", nullable=true)
     */
    private $idu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresseUser", type="string", length=255, nullable=true)
     */
    private $adresseuser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateCommande", type="datetime", nullable=true)
     */
    private $datecommande;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateLivraison", type="datetime", nullable=true)
     */
    private $datelivraison;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prixTotal", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $prixtotal;

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function getIdp(): ?int
    {
        return $this->idp;
    }

    public function setIdp(?int $idp): static
    {
        $this->idp = $idp;

        return $this;
    }

    public function getIdu(): ?int
    {
        return $this->idu;
    }

    public function setIdu(?int $idu): static
    {
        $this->idu = $idu;

        return $this;
    }

    public function getAdresseuser(): ?string
    {
        return $this->adresseuser;
    }

    public function setAdresseuser(?string $adresseuser): static
    {
        $this->adresseuser = $adresseuser;

        return $this;
    }

    public function getDatecommande(): ?\DateTimeInterface
    {
        return $this->datecommande;
    }

    public function setDatecommande(?\DateTimeInterface $datecommande): static
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    public function getDatelivraison(): ?\DateTimeInterface
    {
        return $this->datelivraison;
    }

    public function setDatelivraison(?\DateTimeInterface $datelivraison): static
    {
        $this->datelivraison = $datelivraison;

        return $this;
    }

    public function getPrixtotal(): ?string
    {
        return $this->prixtotal;
    }

    public function setPrixtotal(?string $prixtotal): static
    {
        $this->prixtotal = $prixtotal;

        return $this;
    }


}
