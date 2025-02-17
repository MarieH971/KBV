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

    #[ORM\Column(enumType: UserRole::class)]
    private ?UserRole $userRole;
    
    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private ?string $phone;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private string $email;

    #[ORM\Column(length: 50)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $registerDate = null;

    #[ORM\Column(length: 20)]
    private ?string $licenseNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expirationDateLicense = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

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


    public function getUserRole(): ?UserRole
        {
            return $this->userRole;
        }

        
    public function setUserRole(UserRole $role): static
        {
            $this->userRole = $role;

            return $this;
        }

    public function getPhone(): ?string
        {
            return $this->phone;
        }

        
    public function setPhone(?string $phone): static
        {
            $this->phone = $phone;

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

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getRegisterDate(): ?\DateTimeInterface
    {
        return $this->registerDate;
    }

    public function setRegisterDate(\DateTimeInterface $registerDate): static
    {
        $this->registerDate = $registerDate;

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

    public function getExpirationDateLicense(): ?\DateTimeInterface
    {
        return $this->expirationDateLicense;
    }

    public function setExpirationDateLicense(\DateTimeInterface $expirationDateLicense): static
    {
        $this->expirationDateLicense = $expirationDateLicense;

        return $this;
    }

    
    public function getRoles(): array
        {
            return [$this->getUserRole()->name];
        }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
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
