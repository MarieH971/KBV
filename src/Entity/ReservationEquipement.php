<?php

namespace App\Entity;

use App\Repository\ReservationEquipementRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationEquipementRepository::class)]
class ReservationEquipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adherent $Adherent = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipement $Equipement = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date_debut = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date_retour = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->Adherent;
    }

    public function setAdherent(?Adherent $Adherent): static
    {
        $this->Adherent = $Adherent;

        return $this;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->Equipement;
    }

    public function setEquipement(?Equipement $Equipement): static
    {
        $this->Equipement = $Equipement;

        return $this;
    }


    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }

    public function setDateRetour(\DateTimeInterface $date_retour): static
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }
}
