<?php

namespace App\Entity;


use App\Enum\UserRole;
use App\Enum\Level;
use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $firstName = null;

    #[ORM\Column(length: 50)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $password = null;

    #[ORM\Column(enumType: UserRole::class)]
    private ?UserRole $userRole;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $registrationDate = null;

    #[ORM\Column(length: 20)]
    private ?string $licenseNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $licenseExpirationDate = null;

    #[ORM\Column(enumType: Level::class)]
    private ?Level $level;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

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


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getUserRole(): ?UserRole
        {
            return $this->userRole;
        }

        
    public function setUserRole(UserRole $role): static
        {
            $this->userRole = $role;

            return $this;
        }

    public function getdateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setdateOfBirth(\DateTimeInterface $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): static
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getLicenseNumber(): ?string
    {
        return $this->licenseNumber;
    }

    public function setLicenseNumber(string $licenseNumber): static
    {
        $this->licenseNumber = $licenseNumber;

        return $this;
    }

    public function getLicenseExpirationDate(): ?\DateTimeInterface
    {
        return $this->licenseExpirationDate;
    }

    public function setLicenseExpirationDate(\DateTimeInterface $licenseExpirationDate): static
    {
        $this->licenseExpirationDate = $licenseExpirationDate;

        return $this;
    }

    
    public function getRoles(): array
        {
            return [$this->getUserRole()->name];
        }

    

    public function getLevel(): ?Level
        {
            return $this->level;
        }

        
    public function setLevel(Level $level): static
        {
            $this->level = $level;

            return $this;
        }
}
