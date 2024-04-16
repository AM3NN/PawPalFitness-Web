<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReservationRepository;

#[ORM\Entity(repositoryClass:ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $reservationid=null;

    #[ORM\Column]
    private ?int $places=null;

    #[ORM\Column(length: 20)]
    private ?string $category=null;

    #[ORM\Column(length: 20)]
    private ?string $date=null;

    #[ORM\Column(length: 20)]
    private ?string $starttime=null;

    #[ORM\Column(length: 20)]
    private ?string $endtime=null;

    #[ORM\Column(length: 20)]
    private ?string $status=null;

    #[ORM\Column]
    private ?int $duration=null;

    #[ORM\Column]
    private ?int $pricing=null;

    public function getReservationid(): ?string
    {
        return $this->reservationid;
    }

    public function getPlaces(): ?string
    {
        return $this->places;
    }

    public function setPlaces(string $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getStarttime(): ?string
    {
        return $this->starttime;
    }

    public function setStarttime(string $starttime): static
    {
        $this->starttime = $starttime;

        return $this;
    }

    public function getEndtime(): ?string
    {
        return $this->endtime;
    }

    public function setEndtime(string $endtime): static
    {
        $this->endtime = $endtime;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPricing(): ?string
    {
        return $this->pricing;
    }

    public function setPricing(string $pricing): static
    {
        $this->pricing = $pricing;

        return $this;
    }


}
