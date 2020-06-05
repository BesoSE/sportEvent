<?php

namespace App\Entity;

use App\Repository\IgracRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IgracRepository::class)
 */
class Igrac
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
    private $ime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prezime;

    /**
     * @ORM\Column(type="integer")
     */
    private $godine;

    /**
     * @ORM\Column(type="float")
     */
    private $visina;

    /**
     * @ORM\Column(type="integer")
     */
    private $brojPogodaka;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $BrojAsistencija;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $BrojPobjeda;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $BrojPoraza;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $BrojRemija;

    /**
     * @ORM\Column(type="integer")
     */
    private $BrojOdigranihUtakmica;

    
    /**
     * @ORM\ManyToMany(targetEntity=Tim::class, inversedBy="Igrac")
     */
    private $Tim;

    /**
     * @ORM\ManyToMany(targetEntity=Liga::class, inversedBy="Igrac")
     */
    private $Liga;

    public function __construct()
    {
        $this->Tim = new ArrayCollection();
        $this->Liga = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIme(): ?string
    {
        return $this->ime;
    }

    public function setIme(string $ime): self
    {
        $this->ime = $ime;

        return $this;
    }

    public function getPrezime(): ?string
    {
        return $this->prezime;
    }

    public function setPrezime(string $prezime): self
    {
        $this->prezime = $prezime;

        return $this;
    }

    public function getGodine(): ?int
    {
        return $this->godine;
    }

    public function setGodine(int $godine): self
    {
        $this->godine = $godine;

        return $this;
    }

    public function getVisina(): ?float
    {
        return $this->visina;
    }

    public function setVisina(float $visina): self
    {
        $this->visina = $visina;

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

    public function getBrojAsistencija(): ?int
    {
        return $this->BrojAsistencija;
    }

    public function setBrojAsistencija(?int $BrojAsistencija): self
    {
        $this->BrojAsistencija = $BrojAsistencija;

        return $this;
    }

    public function getBrojPobjeda(): ?int
    {
        return $this->BrojPobjeda;
    }

    public function setBrojPobjeda(?int $BrojPobjeda): self
    {
        $this->BrojPobjeda = $BrojPobjeda;

        return $this;
    }

    public function getBrojPoraza(): ?int
    {
        return $this->BrojPoraza;
    }

    public function setBrojPoraza(?int $BrojPoraza): self
    {
        $this->BrojPoraza = $BrojPoraza;

        return $this;
    }

    public function getBrojRemija(): ?int
    {
        return $this->BrojRemija;
    }

    public function setBrojRemija(?int $BrojRemija): self
    {
        $this->BrojRemija = $BrojRemija;

        return $this;
    }

    public function getBrojOdigranihUtakmica(): ?string
    {
        return $this->BrojOdigranihUtakmica;
    }

    public function setBrojOdigranihUtakmica(string $BrojOdigranihUtakmica): self
    {
        $this->BrojOdigranihUtakmica = $BrojOdigranihUtakmica;

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
        }

        return $this;
    }

    public function removeTim(Tim $tim): self
    {
        if ($this->Tim->contains($tim)) {
            $this->Tim->removeElement($tim);
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
