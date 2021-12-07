<?php

namespace App\Entity;

use App\Repository\TypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypesRepository::class)
 */
class Types
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Tables::class, mappedBy="type")
     */
    private $tables;

    /**
     * @ORM\ManyToMany(targetEntity=Chambres::class, mappedBy="type")
     */
    private $chambres;

    public function __construct()
    {
        $this->tables = new ArrayCollection();
        $this->chambres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    /**
     * @return Collection|Tables[]
     */
    public function getTables(): Collection
    {
        return $this->tables;
    }

    public function addTable(Tables $table): self
    {
        if (!$this->tables->contains($table)) {
            $this->tables[] = $table;
            $table->addType($this);
        }

        return $this;
    }

    public function removeTable(Tables $table): self
    {
        if ($this->tables->removeElement($table)) {
            $table->removeType($this);
        }

        return $this;
    }

    /**
     * @return Collection|Chambres[]
     */
    public function getChambres(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambres $chambre): self
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres[] = $chambre;
            $chambre->addType($this);
        }

        return $this;
    }

    public function removeChambre(Chambres $chambre): self
    {
        if ($this->chambres->removeElement($chambre)) {
            $chambre->removeType($this);
        }

        return $this;
    }
}
