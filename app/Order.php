<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class Order
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var array
     */
    private $items;

    /**
     * @var double
     */
    private $total;

    public function __construct()
    {
        $items = new Collection();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @param array $items
     */
    public function setProducts($items)
    {
        $this->items = $items;
    }

    /**
     * @param double $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Convert a Order Request to Order Object.
     *
     * @param Request $request
     * @return void
     */
    public function fromRequest(Request $request)
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