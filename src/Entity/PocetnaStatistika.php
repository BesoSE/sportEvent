<?php

namespace App\Entity;

use App\Repository\PocetnaStatistikaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PocetnaStatistikaRepository::class)
 */
class PocetnaStatistika
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

   

    /**
     * @ORM\ManyToOne(targetEntity=Korisnik::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Delegat;

    /**
     * @ORM\ManyToOne(targetEntity=Igrac::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Igrac;

     /**
     * @ORM\ManyToOne(targetEntity=Tim::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Domaci;
  /**
     * @ORM\ManyToOne(targetEntity=Tim::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Gosti;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Sport;

    /**
     * @ORM\ManyToOne(targetEntity=Utakmica::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Utakmica;

    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getDelegat(): ?Korisnik
    {
        return $this->Delegat;
    }

    public function setDelegat(?Korisnik $Delegat): self
    {
        $this->Delegat = $Delegat;

        return $this;
    }

    public function getIgrac(): ?Igrac
    {
        return $this->Igrac;
    }

    public function setIgrac(?Igrac $Igrac): self
    {
        $this->Igrac = $Igrac;

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

    public function getGosti(): ?Tim
    {
        return $this->Gosti;
    }

    public function setGosti(?Tim $Gosti): self
    {
        $this->Gosti = $Gosti;

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->Sport;
    }

    public function setSport(?Sport $Sport): self
    {
        $this->Sport = $Sport;

        return $this;
    }

    public function getUtakmica(): ?Utakmica
    {
        return $this->Utakmica;
    }

    public function setUtakmica(?Utakmica $Utakmica): self
    {
        $this->Utakmica = $Utakmica;

        return $this;
    }
}
