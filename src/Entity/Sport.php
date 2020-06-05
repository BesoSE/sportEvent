<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SportRepository::class)
 */
class Sport
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
     * @ORM\Column(type="integer")
     */
    private $BrojIgraca;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tip;

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

    public function getBrojIgraca(): ?int
    {
        return $this->BrojIgraca;
    }

    public function setBrojIgraca(int $BrojIgraca): self
    {
        $this->BrojIgraca = $BrojIgraca;

        return $this;
    }

    public function getTip(): ?bool
    {
        return $this->tip;
    }

    public function setTip(bool $tip): self
    {
        $this->tip = $tip;

        return $this;
    }

   
}
