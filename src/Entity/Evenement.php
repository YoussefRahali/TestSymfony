<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de l'événement est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de l'événement ne doit pas dépasser {{ limit }} caractères."
    )]
    private ?string $nomEv = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La description de l'événement est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "La description de l'événement ne doit pas dépasser {{ limit }} caractères."
    )]
    private ?string $descriptionEv = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "La date et l'heure de l'événement sont obligatoires.")]
    #[Assert\GreaterThanOrEqual(
        "today",
        message: "La date de l'événement doit être dans le futur."
    )]
    private ?\DateTime $dateEv = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEv(): ?string
    {
        return $this->nomEv;
    }

    public function setNomEv(string $nomEv): static
    {
        $this->nomEv = $nomEv;

        return $this;
    }

    public function getDescriptionEv(): ?string
    {
        return $this->descriptionEv;
    }

    public function setDescriptionEv(string $descriptionEv): static
    {
        $this->descriptionEv = $descriptionEv;

        return $this;
    }

    public function getDateEv(): ?\DateTime
    {
        return $this->dateEv;
    }

    public function setDateEv(?\DateTime $dateEv): self
    {
        $this->dateEv = $dateEv;
        return $this;
    }
}
