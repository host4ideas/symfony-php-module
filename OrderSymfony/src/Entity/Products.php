<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="Categoria", columns={"Category"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="CodProd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codprod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Name", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=90, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="Weight", type="float", precision=10, scale=0, nullable=false)
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="Stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Category", referencedColumnName="CodCat")
     * })
     */
    private $category;

    public function getCodprod(): ?int
    {
        return $this->codprod;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }


}
