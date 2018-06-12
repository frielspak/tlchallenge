<?php

namespace App\Models;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class Item
{

    /**
     * @var string
     */
    private $productId;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var double
     */
    private $unitPrice;

    /**
     * @var double
     */
    private $total;

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param double $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @param double $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return double
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Convert array to Item Object.
     *
     * @param array $item
     * @return void
     */
    public function fromArray($item)
    {
        if(isset($item['product-id']))
            $this->setProductId($item['product-id']);

        if(isset($item['quantity']))
            $this->setQuantity(intval($item['quantity']));

        if(isset($item['unit-price']))
            $this->setUnitPrice(doubleval($item['unit-price']));

        if(isset($item['total']))
            $this->setTotal(doubleval($item['total']));
    }
}