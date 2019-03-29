<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AreaRepository")
 */
class Area
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
     * @ORM\Column(type="integer")
     */
    private $mesas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mesa", mappedBy="area")
     */
    private $relmesas;

    public function __construct()
    {
        $this->relmesas = new ArrayCollection();
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

    public function getMesas(): ?int
    {
        return $this->mesas;
    }

    public function setMesas(int $mesas): self
    {
        $this->mesas = $mesas;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Mesa[]
     */
    public function getRelmesas(): Collection
    {
        return $this->relmesas;
    }

    public function addRelmesa(Mesa $relmesa): self
    {
        if (!$this->relmesas->contains($relmesa)) {
            $this->relmesas[] = $relmesa;
            $relmesa->setArea($this);
        }

        return $this;
    }

    public function removeRelmesa(Mesa $relmesa): self
    {
        if ($this->relmesas->contains($relmesa)) {
            $this->relmesas->removeElement($relmesa);
            // set the owning side to null (unless already changed)
            if ($relmesa->getArea() === $this) {
                $relmesa->setArea(null);
            }
        }

        return $this;
    }
}
