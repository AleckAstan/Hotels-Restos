<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PicturesRepository::class)
 */
class Pictures
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Hotels::class, inversedBy="pictures")
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurants::class, inversedBy="pictures")
     */
    private $restaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

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
