<?php

namespace App\Entity;

use App\Repository\ReservationPratiqueRepository;
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

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pratique $type_entrainement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_reservation = null;

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

    public function getTypeEntrainement(): ?Pratique
    {
        return $this->type_entrainement;
    }

    public function setTypeEntrainement(?Pratique $type_entrainement): static
    {
        $this->type_entrainement = $type_entrainement;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): static
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }
}
