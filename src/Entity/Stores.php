<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StoresRepository")
 */
class Stores
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
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flagship;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ethanol_free;

    /**
     * @ORM\Column(type="boolean")
     */
    private $car_wash;

    /**
     * @ORM\Column(type="boolean")
     */
    private $def;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="store")
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFlagship(): ?bool
    {
        return $this->flagship;
    }

    public function setFlagship(bool $flagship): self
    {
        $this->flagship = $flagship;

        return $this;
    }

    public function getEthanolFree(): ?bool
    {
        return $this->ethanol_free;
    }

    public function setEthanolFree(bool $ethanol_free): self
    {
        $this->ethanol_free = $ethanol_free;

        return $this;
    }

    public function getCarWash(): ?bool
    {
        return $this->car_wash;
    }

    public function setCarWash(bool $car_wash): self
    {
        $this->car_wash = $car_wash;

        return $this;
    }

    public function getDef(): ?bool
    {
        return $this->def;
    }

    public function setDef(bool $def): self
    {
        $this->def = $def;

        return $this;
    }

    public function getStoreName(): ?string {
        $city = $this->city;
        $number = $this->number;
        $address = $this->address;

        return $city . ' #' . $number . ' - ' . $address;
    }

/**
 * @return Collection|Comment[]
 */
public
function getComments(): Collection
{
    return $this->comments;
}

public
function addComment(Comment $comment): self
{
    if (!$this->comments->contains($comment)) {
        $this->comments[] = $comment;
        $comment->setStore($this);
    }

    return $this;
}

public
function removeComment(Comment $comment): self
{
    if ($this->comments->contains($comment)) {
        $this->comments->removeElement($comment);
        // set the owning side to null (unless already changed)
        if ($comment->getStore() === $this) {
            $comment->setStore(null);
        }
    }

    return $this;
}
}
