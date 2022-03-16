<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @Vich\Uploadable
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberlike;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datecreation;

    /**
     * @ORM\Column(type="text")
     */
    private $bref;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $salecondition;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $views;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avantage;

 /**
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="image")
     * 
     * @var File|null
     */
    private $imageFile;
    /**
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="image1")
     * 
     * @var File|null
     */
    private $image1File;
    /**
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="image2")
     * 
     * @var File|null
     */
    private $image2File;
    /**
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="image3")
     * 
     * @var File|null
     */
    private $image3File;

    /**
     * @ORM\OneToMany(targetEntity=ProductImage::class, mappedBy="product", cascade={"persist"})
     */
    private $productImages;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="products")
     */
    private $shop;

    public function __construct()
    {
        $this->productImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getNumberlike(): ?int
    {
        return $this->numberlike;
    }

    public function setNumberlike(?int $numberlike): self
    {
        $this->numberlike = $numberlike;

        return $this;
    }


    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(?\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getBref(): ?string
    {
        return $this->bref;
    }

    public function setBref(string $bref): self
    {
        $this->bref = $bref;

        return $this;
    }
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datecreation = new \DateTime();
        }
    }
    public function setImage1File(?File $imag1eFile = null): void
    {
        $this->image1File = $image1File;

        if (null !== $image1File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datecreation = new \DateTime();
        }
    }
    public function setImage2File(?File $image2File = null): void
    {
        $this->image2File = $image2File;

        if (null !== $image2File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datecreation = new \DateTime();
        }
    }
    public function setImage3File(?File $image3File = null): void
    {
        $this->image3File = $image3File;

        if (null !== $image3File) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datecreation = new \DateTime();
        }
    }


    public function getSalecondition(): ?string
    {
        return $this->salecondition;
    }

    public function setSalecondition(?string $salecondition): self
    {
        $this->salecondition = $salecondition;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAvantage(): ?string
    {
        return $this->avantage;
    }

    public function setAvantage(?string $avantage): self
    {
        $this->avantage = $avantage;

        return $this;
    }
    public function __toString(): string
    {
        return ($this->name);
    }
  
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function getImage1File(): ?File
    {
        return $this->imageFile;
    }
    public function getImage2File(): ?File
    {
        return $this->imageFile;
    }
    public function getImage3File(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @return Collection|ProductImage[]
     */
    public function getProductImages(): Collection
    {
        return $this->productImages;
    }

    public function addProductImage(ProductImage $productImage): self
    {
        if (!$this->productImages->contains($productImage)) {
            $this->productImages[] = $productImage;
            $productImage->setProduct($this);
        }

        return $this;
    }

    public function removeProductImage(ProductImage $productImage): self
    {
        if ($this->productImages->removeElement($productImage)) {
            // set the owning side to null (unless already changed)
            if ($productImage->getProduct() === $this) {
                $productImage->setProduct(null);
            }
        }

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }
}
