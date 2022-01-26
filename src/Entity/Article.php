<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_link1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail_product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sale_conditions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bref;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number_view;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number_like;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $avis;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\ManyToMany(targetEntity=CategoryArticle::class, mappedBy="articles")
     */
    private $categoryArticles;

    public function __construct()
    {
        $this->categoryArticles = new ArrayCollection();
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

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImageLink1(): ?string
    {
        return $this->image_link1;
    }

    public function setImageLink1(string $image_link1): self
    {
        $this->image_link1 = $image_link1;

        return $this;
    }

    public function getDetailProduct(): ?string
    {
        return $this->detail_product;
    }

    public function setDetailProduct(string $detail_product): self
    {
        $this->detail_product = $detail_product;

        return $this;
    }

    public function getSaleConditions(): ?string
    {
        return $this->sale_conditions;
    }

    public function setSaleConditions(string $sale_conditions): self
    {
        $this->sale_conditions = $sale_conditions;

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

    public function getNumberView(): ?int
    {
        return $this->number_view;
    }

    public function setNumberView(int $number_view): self
    {
        $this->number_view = $number_view;

        return $this;
    }

    public function getNumberLike(): ?int
    {
        return $this->number_like;
    }

    public function setNumberLike(int $number_like): self
    {
        $this->number_like = $number_like;

        return $this;
    }

    public function getAvis(): ?int
    {
        return $this->avis;
    }

    public function setAvis(int $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * @return Collection|CategoryArticle[]
     */
    public function getCategoryArticles(): Collection
    {
        return $this->categoryArticles;
    }

    public function addCategoryArticle(CategoryArticle $categoryArticle): self
    {
        if (!$this->categoryArticles->contains($categoryArticle)) {
            $this->categoryArticles[] = $categoryArticle;
            $categoryArticle->addArticle($this);
        }

        return $this;
    }

    public function removeCategoryArticle(CategoryArticle $categoryArticle): self
    {
        if ($this->categoryArticles->removeElement($categoryArticle)) {
            $categoryArticle->removeArticle($this);
        }

        return $this;
    }
}
