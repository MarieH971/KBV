<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use App\Enum\Niveau;
use App\Enum\RoleAdherent;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: AdherentRepository::class)]
class Adherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $mot_de_passe = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTime $date_de_naissance = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date_inscription = null;

    #[ORM\Column(length: 20)]
    private ?string $numero_licence = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $date_expiration_licence = null;

    #[ORM\Column(enumType: RoleAdherent::class)]
    private ?RoleAdherent $roleAdherent;

    #[ORM\Column(enumType: Niveau::class)]
    private ?Niveau $niveau = null;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTime
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTime $date_de_naissance): static
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getDateInscription(): ?\DateTime
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTime $date_inscription): static
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getNumeroLicence(): ?string
    {
        return $this->numero_licence;
    }

    public function setNumeroLicence(string $numero_licence): static
    {
        $this->numero_licence = $numero_licence;

        return $this;
    }

    public function getDateExpirationLicence(): ?\DateTime
    {
        return $this->date_expiration_licence;
    }

    public function setDateExpirationLicence(\DateTime $date_expiration_licence): static
    {
        $this->date_expiration_licence = $date_expiration_licence;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRoleAdherent(): ?RoleAdherent
    {
        return $this->roleAdherent;
    }

    public function setRoleAdherent(RoleAdherent $roleAdherent): static
    {
        $this->roleAdherent = $roleAdherent;

        return $this;
    }

    // Méthode pour vérifier si l'adhérent est un administrateur licencié
    public function isAdministrateurLicencie(): bool
    {
        return $this->roleAdherent === RoleAdherent::ADMINISTRATEUR_LICENCIE;
    }
}
