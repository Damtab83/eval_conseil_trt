<?php

namespace App\Entity;

use App\Repository\NoticeRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: NoticeRepository::class)]
class Notice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Votre annonce doit avoir un titre')]
    #[Assert\Length(
        min: 4,
        max: 50,
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Vous devez décrire votre annonce')]
    #[Assert\Length(
        min: 20,
    )]
    private ?string $description = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: 'Votre annonce doit être situer')]
    #[Assert\Length(
        min: 4,
        max: 150,
    )]
    private ?string $location = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Indiquer le salaire de votre annonce')]
    private ?int $salary = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank(message: 'Indiquer le temps de travail de votre annonce')]
    #[Assert\Length(min: 4, max: 10)]
    private ?string $schedule = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'notices')]
    private ?User $recruteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): static
    {
        $this->salary = $salary;

        return $this;
    }

    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    public function setSchedule(string $schedule): static
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function __construct()
    {
        return $this->createdAt = new \DateTimeImmutable();
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

                    // public function setCreatedAt(\DateTimeImmutable $createdAt): static
                    // {
                    //     $this->createdAt = $createdAt;

                    //     re                                                                                                                                                                                                                                                                                                           turn $this;
                    // }

    public function getRecruteur(): ?User
    {
        return $this->recruteur;
    }

    public function setRecruteur(?User $recruteur): static
    {
        $this->recruteur = $recruteur;

        return $this;
    }
}
