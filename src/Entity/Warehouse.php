<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="warehouse")
 * @UniqueEntity(fields={"name"})
 */
class Warehouse {

    /**
     * @var guid
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=127, unique=true, nullable=true)
     */
    private $code;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetimetz", nullable=true)
     */
    private $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated_at", type="datetimetz", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="Inventory", mappedBy="warehouse")
     */
    private $inventories;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->inventories = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Warehouse
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Warehouse
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     *
     * @return Warehouse
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param DateTime $updatedAt
     *
     * @return Warehouse
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function __toString()
    {
        return $this->getName() ?: 'Warehouse';
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Warehouse
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

    /**
     * Add inventory
     *
     * @param Inventory $inventory
     *
     * @return Warehouse
     */
    public function addInventory(Inventory $inventory)
    {
        $this->inventories[] = $inventory;

        return $this;
    }

    /**
     * Remove inventory
     *
     * @param Inventory $inventory
     */
    public function removeInventory(Inventory $inventory)
    {
        $this->inventories->removeElement($inventory);
    }

    /**
     * Get inventories
     *
     * @return Collection
     */
    public function getInventories()
    {
        return $this->inventories;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Warehouse
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

}
