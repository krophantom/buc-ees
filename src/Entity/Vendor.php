<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VendorRepository")
 */
class Vendor
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
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addr_line_1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addr_line_2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addr_city_state_zip;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAddrLine1(): ?string
    {
        return $this->addr_line_1;
    }

    public function setAddrLine1(string $addr_line_1): self
    {
        $this->addr_line_1 = $addr_line_1;

        return $this;
    }

    public function getAddrLine2(): ?string
    {
        return $this->addr_line_2;
    }

    public function setAddrLine2(string $addr_line_2): self
    {
        $this->addr_line_2 = $addr_line_2;

        return $this;
    }

    public function getAddrCityStateZip(): ?string
    {
        return $this->addr_city_state_zip;
    }

    public function setAddrCityStateZip(string $addr_city_state_zip): self
    {
        $this->addr_city_state_zip = $addr_city_state_zip;

        return $this;
    }
}
