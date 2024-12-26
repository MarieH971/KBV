<?php

namespace App\Entity;

use App\Repository\ReservationPratiqueRepository;
use DateTime;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationPratiqueRepository::class)]
class ReservationPratique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date_reservation = null;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDateReservation(): \DateTime
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTime $date_reservation): static
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }
}
