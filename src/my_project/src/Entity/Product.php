<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ApiResource(
 *  normalizationContext={"groups"={"read"}},
 *  denormalizationContext={"groups"={"write"}}
 * )
 * @ApiFilter(OrderFilter::class)
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @UniqueEntity("name")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"read", "write"})
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @Groups({"read", "write"})
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read", "write"})
     */
    private $rating;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("write")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups("write")
     */
    private $variations = [];

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getVariations(): ?array
    {
        return $this->variations;
    }

    public function setVariations(?array $variations): self
    {
        $this->variations = $variations;

        return $this;
    }
}
