<?php

namespace App\Logic\DataProvider;

use App\Logic\Interfaces\Customer;
use App\Logic\Interfaces\DataProviderInterface;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class EloquentDataProvider implements DataProviderInterface
{

    /**
     * Get customer by id.
     *
     * @param $id Customer Id
     * @return mixed Customer object
     */
    public function getCustomerById($id)
    {
        return Customer::find($id);
    }

    /**
     * Get customer by name.
     *
     * @param $name Customer Name
     * @return mixed Customer object
     */
    public function getCustomerByName($name)
    {
        return Customer::where('name', $name)->get();
    }
}