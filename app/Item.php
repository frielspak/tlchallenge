<?php

namespace App;
use Illuminate\Http\Request;

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
    public function setCustomerId($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param array $unitPrice
     */
    public function setProducts($unitPrice)
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
     * Convert  to Item Object.
     *
     * @param Request $request
     * @return void
     */
    public function fromStdClass(StdClass $request)
    {
        if(isset($request->id))
            $this->setId($request->id);

        if(isset($request->{'customer-id'}))
            $this->customerId = $request->{'customer-id'};

        if(isset($request->items))
        {
            foreach ($request->items as $item)
            {

            }
        }

    }
}