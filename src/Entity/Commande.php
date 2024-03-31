<?php

namespace App\Entity;

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


}
