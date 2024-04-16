<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< Updated upstream

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


=======
use App\Repository\TravailleurRepository;
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
#[ORM\Entity(repositoryClass: TravailleurRepository::class)]
class Travailleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome = null;

    #[ORM\Column(length: 255)]
    private ?string $experience = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

<<<<<<< Updated upstream
    #[ORM\ManyToOne(targetEntity: Personne::class, inversedBy: "travailleurs")]
    #[ORM\JoinColumn(name: "personne_id", referencedColumnName: "id")]
=======
    #[ORM\ManyToOne(inversedBy: "travailleurs")]
>>>>>>> Stashed changes
    private ?Personne $personne = null;
    

    public function getId(): ?int
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
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
}
