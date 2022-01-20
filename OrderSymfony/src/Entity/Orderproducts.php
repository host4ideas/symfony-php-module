<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orderproducts
 *
 * @ORM\Table(name="orderproducts", indexes={@ORM\Index(name="CodPed", columns={"Order"}), @ORM\Index(name="CodProd", columns={"Product"})})
 * @ORM\Entity
 */
class Orderproducts
{
    /**
     * @var int
     *
     * @ORM\Column(name="CodOrdProd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codordprod;

    /**
     * @var int
     *
     * @ORM\Column(name="Units", type="integer", nullable=false)
     */
    private $units;

    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Product", referencedColumnName="CodProd")
     * })
     */
    private $product;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Order", referencedColumnName="CodOrd")
     * })
     */
    private $order;

    public function getCodordprod(): ?int
    {
        return $this->codordprod;
    }

    public function getUnits(): ?int
    {
        return $this->units;
    }

    public function setUnits(int $units): self
    {
        $this->units = $units;

        return $this;
    }

    public function getProduct(): ?Products
    {
        return $this->product;
    }

    public function setProduct(?Products $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getOrder(): ?Orders
    {
        return $this->order;
    }

    public function setOrder(?Orders $order): self
    {
        $this->order = $order;

        return $this;
    }


}
