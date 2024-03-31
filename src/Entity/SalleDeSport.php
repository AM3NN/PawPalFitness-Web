<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalleDeSport
 *
 * @ORM\Table(name="salle_de_sport")
 * @ORM\Entity
 */
class SalleDeSport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_salle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_salle", type="string", length=50, nullable=false)
     */
    private $nomSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="description_salle", type="text", length=65535, nullable=false)
     */
    private $descriptionSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="region_salle", type="string", length=0, nullable=false)
     */
    private $regionSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="image_salle", type="string", length=255, nullable=false)
     */
    private $imageSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_salle", type="string", length=50, nullable=false)
     */
    private $adresseSalle;


}
