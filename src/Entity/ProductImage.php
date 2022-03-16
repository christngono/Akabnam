<?php

namespace App\Entity;

use App\Repository\ProductImageRepository;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProductImageRepository::class)
 * @Vich\Uploadable()
 */
class ProductImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagename;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $createAt;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productImages")
     */
    private $product;
    
 /**
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imagename")
     * 
     * @var File|null
     */
    private $imageFile;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return ($this->imagename);
    }
  

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->CreateAte= new \DateTime();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(?\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getImagename(): ?string
    {
        return $this->imagename;
    }

    public function setImagename(?string $imagename): self
    {
        $this->imagename = $imagename;

        return $this;
    }
}
