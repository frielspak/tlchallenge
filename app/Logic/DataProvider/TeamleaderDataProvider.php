<?php

namespace App\Logic\DataProvider;

use App\Logic\Interfaces\Customer;
use App\Logic\Interfaces\DataProviderInterface;

class TeamleaderDataProvider implements DataProviderInterface
{

    /**
     * @param $id Customer Id
     *
     * Get customer by id.
     *
     * @return mixed Customer object
     */
    public function getCustomerById($id)
    {
        return Customer::find($id);
    }

    /**
     * @param $name Customer Name
     *
     * Get customer by name.
     *
     * @return mixed Customer object
     */
    public function getCustomerByName($name)
    {
        return Customer::where('name', $name)->get();
    }
}