<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductsRepository;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[ORM\Table(name: "produit")]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idP", type: "integer", nullable: false)]
    private $id;

    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: false)]
    private $title;

    #[ORM\Column(name: "description", type: "string", length: 255, nullable: true)]
    private $description;

    #[ORM\Column(name: "reference", type: "string", length: 255, nullable: true)]
    private $reference;

    #[ORM\Column(name: "image", type: "string", length: 255, nullable: false)]
    private $image;

    #[ORM\Column(name: "categorie", type: "string", length: 255, nullable: false)]
    private $categorie;

    #[ORM\Column(name: "prix", type: "float", nullable: false)]
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }
}
