<?php

namespace App\Entity;

use App\Repository\ChambresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambresRepository::class)
 */
class Chambres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $person_number;

    /**
     * @ORM\ManyToMany(targetEntity=Types::class, inversedBy="chambres")
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Hotels::class, inversedBy="chambres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hotel;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonNumber(): ?int
    {
        return $this->person_number;
    }

    public function setPersonNumber(int $person_number): self
    {
        $this->person_number = $person_number;

        return $this;
    }

    /**
     * @return Collection|Types[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Types $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(Types $type): self
    {
        $this->type->removeElement($type);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getHotel(): ?Hotels
    {
        return $this->hotel;
    }

    public function setHotel(?Hotels $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }
}
