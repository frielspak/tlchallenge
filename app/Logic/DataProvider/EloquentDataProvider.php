<?php

namespace App\Logic\DataProvider;

use App\Customer;
use App\Logic\Interfaces\DataProviderInterface;
use App\Product;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class EloquentDataProvider implements DataProviderInterface
{

    /**
     * Get customer by id.
     *
     * @param int $id Customer Id
     * @return mixed Customer object
     */
    public function getCustomerById($id)
    {
        return Customer::find($id);
    }

    /**
     * Get customer by name.
     *
     * @param string $name Customer Name
     * @return mixed Customer object
     */
    public function getCustomerByName($name)
    {
        return Customer::where('name', $name)->get();
    }

    /**
     * Get product by id.
     *
     * @param string $id Product Id
     * @return mixed Product object
     */
    public function getProductById($id)
    {
        return Product::find($id);
    }

    /**
     * Get multiple products by id.
     *
     * @param array $ids Product Ids
     * @return mixed Product objects
     */
    public function getProductsByIds($ids)
    {
        return Product::whereIn('id', $ids)->get();
    }
}