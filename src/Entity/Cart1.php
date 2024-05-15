<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\Cart1Repository;

#[ORM\Entity(repositoryClass: Cart1Repository::class)]

class Cart1
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "integer")]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: "Products")]
    #[ORM\JoinColumn(name: "productid", referencedColumnName: "id")]
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getProduct(): ?Products
    {
        return $this->product;
    }

    public function setProduct(?Products $product): self
    {
        $this->product = $product;
        return $this;
    }
}
