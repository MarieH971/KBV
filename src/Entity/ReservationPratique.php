<?php

namespace App\Entity;

use App\Repository\ReservationPratiqueRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationPratiqueRepository::class)]
class ReservationPratique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adherents $adherents = null;



    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date_reservation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pratique $session = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherents(): ?Adherents
    {
        return $this->adherents;
    }

    public function setAdherents(?Adherents $adherents): static
    {
        $this->adherents = $adherents;

        return $this;
    }


    public function getDateReservation(): ?\DateTime
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTime $date_reservation): static
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getSession(): ?Pratique
    {
        return $this->session;
    }

    public function setSession(?Pratique $session): static
    {
        $this->session = $session;

        return $this;
    }
}
