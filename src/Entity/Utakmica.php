<?php

namespace App\Entity;

use App\Repository\UtakmicaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtakmicaRepository::class)
 */
class Utakmica
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     */
    private $mjesto;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datum;
    /**
     * @ORM\ManyToOne(targetEntity=Liga::class)
     */
    private $Liga;

    /**
     * @ORM\ManyToOne(targetEntity=Tim::class)
     */
    private $Domaci;

    /**
     * @ORM\ManyToOne(targetEntity=Tim::class)
     */
    private $Gosti;

    /**
     * @ORM\ManyToOne(targetEntity=Igrac::class)
     */
    private $IgracD;

    /**
     * @ORM\ManyToOne(targetEntity=Igrac::class)
     */
    private $IgracG;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMjesto(): ?string
    {
        return $this->mjesto;
    }

    public function setMjesto(string $mjesto): self
    {
        $this->mjesto = $mjesto;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getDomaci(): ?Tim
    {
        return $this->Domaci;
    }

    public function setDomaci(?Tim $Domaci): self
    {
        $this->Domaci = $Domaci;

        return $this;
    }

    public function getLiga(): ?Liga
    {
        return $this->Liga;
    }

    public function setLiga(?Liga $Liga): self
    {
        $this->Liga = $Liga;

        return $this;
    }

    public function getGosti(): ?Tim
    {
        return $this->Gosti;
    }

    public function setGosti(?Tim $Gosti): self
    {
        $this->Gosti = $Gosti;

        return $this;
    }

    public function getIgracD(): ?Igrac
    {
        return $this->IgracD;
    }

    public function setIgracD(?Igrac $IgracD): self
    {
        $this->IgracD = $IgracD;

        return $this;
    }

    public function getIgracG(): ?Igrac
    {
        return $this->IgracG;
    }

    public function setIgracG(?Igrac $IgracG): self
    {
        $this->IgracG = $IgracG;

        return $this;
    }


}
