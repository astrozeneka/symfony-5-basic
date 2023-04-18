<?php

namespace App\Entity;

use App\Repository\SpecimenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecimenRepository::class)]
class Specimen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column('location', length:255)]
    private ?string $location = null;

    #[ORM\Column('temperature')]
    private ?float $temperature = null;

    #[ORM\Column('collectorName')]
    private ?string $collectorName = null;

    #[ORM\Column('image', nullable:True)]
    private ?string $image = null;

    #[ORM\Column('sampleId')]
    private ?string $sampleId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getCollectorName(): ?string
    {
        return $this->collectorName;
    }

    public function setCollectorName(string $collectorName): self
    {
        $this->collectorName = $collectorName;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSampleId(): ?string
    {
        return $this->sampleId;
    }

    public function setSampleId(string $sampleId): self
    {
        $this->sampleId = $sampleId;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }
}
