<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travailleur
 *
 * @ORM\Table(name="travailleur", indexes={@ORM\Index(name="fk_personne_id", columns={"personne_id"})})
 * @ORM\Entity
 */
class Travailleur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="diplome", type="string", length=200, nullable=true)
     */
    private $diplome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience", type="string", length=200, nullable=true)
     */
    private $experience;

    /**
     * @var string|null
     *
     * @ORM\Column(name="langue", type="string", length=200, nullable=true)
     */
    private $langue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categorie", type="string", length=200, nullable=true)
     */
    private $categorie;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personne_id", referencedColumnName="id")
     * })
     */
    private $personne;


}
