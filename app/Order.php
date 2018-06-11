<?php

namespace App;
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
        $this->items = new Collection();
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
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Convert a Order array to Order Object.
     *
     * @param array $order
     * @return void
     */
    public function fromArray($order)
    {
        if(isset($order['id']))
            $this->setId(intval($order['id']));

        if(isset($order['customer-id']))
            $this->setCustomerId(intval($order['customer-id']));

        if(isset($order['items']))
        {
            foreach ($order['items'] as $item)
            {
                $objItem = new Item();
                $objItem->fromArray($item);

                $this->items->push($objItem);
            }
        }

        if(isset($order['total']))
            $this->setTotal(doubleval($order['total']));
    }
}