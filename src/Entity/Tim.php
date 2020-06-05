<?php

namespace App\Entity;

use App\Repository\TimRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimRepository::class)
 */
class Tim
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
    private $naziv;

    /**
     * @ORM\ManyToMany(targetEntity=Liga::class, inversedBy="Tim")
     */
    private $Liga;

    /**
     * @ORM\Column(type="integer")
     */
    private $Bodovi;

    /**
     * @ORM\Column(type="integer")
     */
    private $Odigraneutakmice;

    /**
     * @ORM\Column(type="integer")
     */
    private $BrojPobjeda;

    /**
     * @ORM\Column(type="integer")
     */
    private $BrojPoraza;

/**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $brojPogodaka;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $brojPrimljenih;


/**
     * @ORM\Column(type="integer")
     */
    private $BrojRemija;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NazivMjesta;

    
    /**
     * @ORM\ManyToMany(targetEntity=Igrac::class, mappedBy="Tim")
     */
    private $Igrac;

    public function __construct()
    {
        $this->Liga = new ArrayCollection();
        $this->Igrac = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaziv(): ?string
    {
        return $this->naziv;
    }

    public function setNaziv(string $naziv): self
    {
        $this->naziv = $naziv;

        return $this;
    }

    public function getBrojPogodaka(): ?int
    {
        return $this->brojPogodaka;
    }

    public function setBrojPogodaka(int $brojPogodaka): self
    {
        $this->brojPogodaka = $brojPogodaka;

        return $this;
    }

    public function getBrojPrimljenih(): ?int
    {
        return $this->brojPrimljenih;
    }

    public function setBrojPrimljenih(int $brojPrimljenih): self
    {
        $this->brojPrimljenih = $brojPrimljenih;

        return $this;
    }


    public function getBodovi(): ?int
    {
        return $this->Bodovi;
    }

    public function setBodovi(int $Bodovi): self
    {
        $this->Bodovi = $Bodovi;

        return $this;
    }

    public function getOdigraneutakmice(): ?int
    {
        return $this->Odigraneutakmice;
    }

    public function setOdigraneutakmice(int $Odigraneutakmice): self
    {
        $this->Odigraneutakmice = $Odigraneutakmice;

        return $this;
    }

    public function getBrojPobjeda(): ?int
    {
        return $this->BrojPobjeda;
    }

    public function setBrojPobjeda(int $BrojPobjeda): self
    {
        $this->BrojPobjeda = $BrojPobjeda;

        return $this;
    }

    public function getBrojRemija(): ?int
    {
        return $this->BrojRemija;
    }

    public function setBrojRemija(int $BrojRemija): self
    {
        $this->BrojRemija = $BrojRemija;

        return $this;
    }

    public function getBrojPoraza(): ?int
    {
        return $this->BrojPoraza;
    }

    public function setBrojPoraza(int $BrojPoraza): self
    {
        $this->BrojPoraza = $BrojPoraza;

        return $this;
    }

    public function getNazivMjesta(): ?string
    {
        return $this->NazivMjesta;
    }

    public function setNazivMjesta(string $NazivMjesta): self
    {
        $this->NazivMjesta = $NazivMjesta;

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
            $igrac->addTim($this);
        }

        return $this;
    }

    public function removeIgrac(Igrac $igrac): self
    {
        if ($this->Igrac->contains($igrac)) {
            $this->Igrac->removeElement($igrac);
            $igrac->removeTim($this);
        }

        return $this;
    }

    /**
     * @return Collection|Liga[]
     */
    public function getLiga(): Collection
    {
        return $this->Liga;
    }

    public function addLiga(Liga $liga): self
    {
        if (!$this->Liga->contains($liga)) {
            $this->Liga[] = $liga;
        }

        return $this;
    }

    public function removeLiga(Liga $liga): self
    {
        if ($this->Liga->contains($liga)) {
            $this->Liga->removeElement($liga);
        }

        return $this;
    }
}
