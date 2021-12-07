<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationsRepository::class)
 */
class Reservations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="smallint")
     */
    private $room_num;

    /**
     * @ORM\Column(type="smallint")
     */
    private $person_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $payment_ref;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Hotels::class, inversedBy="reservations")
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurants::class, inversedBy="reservations")
     */
    private $restaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRoomNum(): ?int
    {
        return $this->room_num;
    }

    public function setRoomNum(int $room_num): self
    {
        $this->room_num = $room_num;

        return $this;
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

    public function getPaymentRef(): ?string
    {
        return $this->payment_ref;
    }

    public function setPaymentRef(string $payment_ref): self
    {
        $this->payment_ref = $payment_ref;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
