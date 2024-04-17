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

      public function getReservationId(): ?int
      {
          return $this->reservationid;
      }
  
      public function getPlaces(): ?int
      {
          return $this->places;
      }
  
      public function getCategory(): ?string
      {
          return $this->category;
      }
  
      public function getDate(): ?string
      {
          return $this->date;
      }
  
      public function getStartTime(): ?string
      {
          return $this->starttime;
      }
  
      public function getEndTime(): ?string
      {
          return $this->endtime;
      }
  
      public function getStatus(): ?string
      {
          return $this->status;
      }
  
      public function getDuration(): ?int
      {
          return $this->duration;
      }
  
      public function getPricing(): ?int
      {
          return $this->pricing;
      }

      public function setPlaces(int $places): static
      {
          $this->places = $places;

          return $this;
      }

      public function setCategory(string $category): static
      {
          $this->category = $category;

          return $this;
      }

      public function setDate(string $date): static
      {
          $this->date = $date;

          return $this;
      }

      public function setStarttime(string $starttime): static
      {
          $this->starttime = $starttime;

          return $this;
      }

      public function setEndtime(string $endtime): static
      {
          $this->endtime = $endtime;

          return $this;
      }

      public function setStatus(string $status): static
      {
          $this->status = $status;

          return $this;
      }

      public function setDuration(int $duration): static
      {
          $this->duration = $duration;

          return $this;
      }

      public function setPricing(int $pricing): static
      {
          $this->pricing = $pricing;

          return $this;
      }
  }

