<?php

namespace App\Entity;

use App\Repository\ShopRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShopRepository::class)
 */
class Shop
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameshop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageBanner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageProfil;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creatAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameshop(): ?string
    {
        return $this->nameshop;
    }

    public function setNameshop(string $nameshop): self
    {
        $this->nameshop = $nameshop;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImageBanner(): ?string
    {
        return $this->imageBanner;
    }

    public function setImageBanner(?string $imageBanner): self
    {
        $this->imageBanner = $imageBanner;

        return $this;
    }

    public function getImageProfil(): ?string
    {
        return $this->imageProfil;
    }

    public function setImageProfil(?string $imageProfil): self
    {
        $this->imageProfil = $imageProfil;

        return $this;
    }

    public function getCreatAt(): ?\DateTimeInterface
    {
        return $this->creatAt;
    }

    public function setCreatAt(\DateTimeInterface $creatAt): self
    {
        $this->creatAt = $creatAt;

        return $this;
    }
}
