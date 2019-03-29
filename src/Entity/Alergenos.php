<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlergenosRepository")
 */
class Alergenos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingrediente", mappedBy="alergeno")
     */
    private $ingredientes;

    public function __construct()
    {
        $this->ingredientes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return Collection|Ingrediente[]
     */
    public function getIngredientes(): Collection
    {
        return $this->ingredientes;
    }

    public function addIngrediente(Ingrediente $ingrediente): self
    {
        if (!$this->ingredientes->contains($ingrediente)) {
            $this->ingredientes[] = $ingrediente;
            $ingrediente->setAlergeno($this);
        }

        return $this;
    }

    public function removeIngrediente(Ingrediente $ingrediente): self
    {
        if ($this->ingredientes->contains($ingrediente)) {
            $this->ingredientes->removeElement($ingrediente);
            // set the owning side to null (unless already changed)
            if ($ingrediente->getAlergeno() === $this) {
                $ingrediente->setAlergeno(null);
            }
        }

        return $this;
    }
}
