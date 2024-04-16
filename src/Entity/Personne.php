<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< Updated upstream
<<<<<<< Updated upstream

/**
 * Personne
 *
 * @ORM\Table(name="personne", indexes={@ORM\Index(name="fk_role", columns={"role_id"})})
 * @ORM\Entity
 */
class Personne
=======
=======
>>>>>>> Stashed changes
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\PersonneRepository;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne 
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=200, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=200, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=200, nullable=false)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

<<<<<<< Updated upstream
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;
=======
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Mot de passe est obligatoire")]
    #[Assert\Length(
        min: 8,
        minMessage: "Le mot de passe doit contenir au moins {{ limit }} caractères."
    )]
    private ?string $password = null;
    #[ORM\Column(type: "integer", nullable: true)]
    #[Assert\NotBlank(message: "Âge est obligatoire")]
    #[Assert\Type(type: "integer", message: "Âge doit être un nombre entier")]
    #[Assert\Range(min: 1, minMessage: "Âge doit être supérieur à 0")]
    private ?int $age = null;
<<<<<<< Updated upstream
>>>>>>> Stashed changes

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="role_id")
     * })
     */
    private $role;
=======
    
    #[ORM\ManyToOne(targetEntity: Role::class)]
    #[ORM\JoinColumn(name: "role_id", referencedColumnName: "role_id")]
    private ?Role $role = null; // Add the ManyToOne relationship with Role
>>>>>>> Stashed changes

<<<<<<< Updated upstream

=======
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;
        return $this;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = hash('sha256', $password);
        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }


<<<<<<< Updated upstream
  
>>>>>>> Stashed changes
=======
    public function setRole(?Role $role): self
    {
        $this->role = $role;
        return $this;
    }


 
>>>>>>> Stashed changes
}
