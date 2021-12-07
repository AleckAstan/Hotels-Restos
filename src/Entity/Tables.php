<?php

namespace App\Entity;

use App\Repository\TablesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TablesRepository::class)
 */
class Tables
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
    private $place_number;

    /**
     * @ORM\ManyToMany(targetEntity=Types::class, inversedBy="tables")
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurants::class, inversedBy="tables")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceNumber(): ?int
    {
        return $this->place_number;
    }

    public function setPlaceNumber(int $place_number): self
    {
        $this->place_number = $place_number;

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

    public function getRestaurant(): ?Restaurants
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurants $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
