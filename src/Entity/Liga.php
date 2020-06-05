<?php

namespace App\Entity;

use App\Repository\LigaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigaRepository::class)
 */
class Liga
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Naziv;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $sport;

    /**
     * @ORM\ManyToMany(targetEntity=Igrac::class, mappedBy="Liga")
     */
    private $Igrac;

    
  

    /**
     * @ORM\ManyToMany(targetEntity=Tim::class, mappedBy="Liga")
     */
    private $Tim;

    public function __construct()
    {
        $this->Igrac = new ArrayCollection();
        $this->Tim = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaziv(): ?string
    {
        return $this->Naziv;
    }

    public function setNaziv(string $Naziv): self
    {
        $this->Naziv = $Naziv;

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * @return Collection|Igrac[]
     */
    public function getIgrac(): Collection
    {
        return $this->Igrac;
    }

    public function addIgrac(Igrac $igrac): self
    {
        if (!$this->Igrac->contains($igrac)) {
            $this->Igrac[] = $igrac;
            $igrac->addLiga($this);
        }

        return $this;
    }

    public function removeIgrac(Igrac $igrac): self
    {
        if ($this->Igrac->contains($igrac)) {
            $this->Igrac->removeElement($igrac);
            $igrac->removeLiga($this);
        }

        return $this;
    }

    
    /**
     * @return Collection|Tim[]
     */
    public function getTim(): Collection
    {
        return $this->Tim;
    }

    public function addTim(Tim $tim): self
    {
        if (!$this->Tim->contains($tim)) {
            $this->Tim[] = $tim;
            $tim->addLiga($this);
        }

        return $this;
    }

    public function removeTim(Igrac $tim): self
    {
        if ($this->Tim->contains($tim)) {
            $this->Tim->removeElement($tim);
            $tim->removeLiga($this);
        }

        return $this;
    }
}
