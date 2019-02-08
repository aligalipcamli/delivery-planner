<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="inventory")
 * @UniqueEntity(fields={"product", "warehouse"})
 */
class Inventory {

    /**
     * @var guid
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="inventories")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="inventories")
     * @ORM\JoinColumn(name="warehouse_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $warehouse;

    /**
     * @var integer
     *
     * @ORM\Column(name="on_hand", type="integer", nullable=true)
     * @Assert\Range(min=0)
     */
    private $onHand;

    /**
     * @var integer
     *
     * @ORM\Column(name="on_hold", type="integer", nullable=true, options={"default":0})
     * @Assert\Range(min=0)
     */
    private $onHold;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * Get id
     *
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set onHand
     *
     * @param integer $onHand
     *
     * @return Inventory
     */
    public function setOnHand($onHand)
    {
        $this->onHand = $onHand;

        return $this;
    }

    /**
     * Get onHand
     *
     * @return integer
     */
    public function getOnHand()
    {
        return $this->onHand;
    }

    /**
     * Set onHold
     *
     * @param integer $onHold
     *
     * @return Inventory
     */
    public function setOnHold($onHold)
    {
        $this->onHold = $onHold;

        return $this;
    }

    /**
     * Get onHold
     *
     * @return integer
     */
    public function getOnHold()
    {
        return $this->onHold;
    }

    /**
     * Set product
     *
     * @param Product $product
     *
     * @return Inventory
     */
    public function setProduct(Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set warehouse
     *
     * @param Warehouse $warehouse
     *
     * @return Inventory
     */
    public function setWarehouse(Warehouse $warehouse = null)
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * Get warehouse
     *
     * @return Warehouse
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    public function __toString()
    {
        return $this->getId() ?: "Inventory";
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Inventory
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

}
