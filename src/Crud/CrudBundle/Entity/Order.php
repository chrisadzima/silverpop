<?php

namespace Crud\CrudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Order {
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="date")
     */
    protected $purchase_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $item_id;

    /**
     * @ORM\Column(type="float")
     */
    protected $discount;

    protected $item_name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set purchase_date
     *
     * @param \DateTime $purchaseDate
     * @return Order
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchase_date = $purchaseDate;

        return $this;
    }

    /**
     * Get purchase_date
     *
     * @return \DateTime 
     */
    public function getPurchaseDate()
    {
        return $this->purchase_date;
    }

    /**
     * Set item_id
     *
     * @param integer $itemId
     * @return Order
     */
    public function setItemId($itemId)
    {
        $this->item_id = $itemId;

        return $this;
    }

    /**
     * Get item_id
     *
     * @return integer 
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return Order
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
