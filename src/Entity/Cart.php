<?php

namespace App\Entity;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CartRepository;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $cartId = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $reservationid = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $places = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $timestamp;

    public function getCartId(): ?int
    {
        return $this->cartId;
    }

    public function getReservationid(): ?int
    {
        return $this->reservationid;
    }

    public function setReservationid(?int $reservationid): static
    {
        $this->reservationid = $reservationid;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(?int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
