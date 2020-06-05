<?php

namespace App\Entity;

use App\Repository\StatistikaUtakmiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatistikaUtakmiceRepository::class)
 */
class StatistikaUtakmice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $BrojGolovaDomaci;

    /**
     * @ORM\Column(type="integer")
     */
    private $BrojGolovaGosti;

   
    /**
     * @ORM\ManyToOne(targetEntity=Korisnik::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Delegat;

    /**
     * @ORM\OneToOne(targetEntity=Utakmica::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Utakmica;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrojGolovaDomaci(): ?int
    {
        return $this->BrojGolovaDomaci;
    }

    public function setBrojGolovaDomaci(int $BrojGolovaDomaci): self
    {
        $this->BrojGolovaDomaci = $BrojGolovaDomaci;

        return $this;
    }

    public function getBrojGolovaGosti(): ?int
    {
        return $this->BrojGolovaGosti;
    }

    public function setBrojGolovaGosti(int $BrojGolovaGosti): self
    {
        $this->BrojGolovaGosti = $BrojGolovaGosti;

        return $this;
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

    public function getUtakmica(): ?Utakmica
    {
        return $this->Utakmica;
    }

    public function setUtakmica(Utakmica $Utakmica): self
    {
        $this->Utakmica = $Utakmica;

        return $this;
    }
}
