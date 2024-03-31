<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoris
 *
 * @ORM\Table(name="favoris", indexes={@ORM\Index(name="FK_animal", columns={"IDA"})})
 * @ORM\Entity
 */
class Favoris
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDf", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idf;

    /**
     * @var string
     *
     * @ORM\Column(name="noma", type="string", length=100, nullable=false)
     */
    private $noma;

    /**
     * @var int
     *
     * @ORM\Column(name="IDA", type="integer", nullable=false)
     */
    private $ida;


}
