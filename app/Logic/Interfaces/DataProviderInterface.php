<?php

namespace App\Logic\Interfaces;

interface DataProviderInterface
{
    /**
     * @param $id Customer Id
     *
     * Get customer by id.
     *
     * @return mixed Customer object
     */
    public function getCustomerById($id);

    /**
     * @param $name Customer Name
     *
     * Get customer by name.
     *
     * @return mixed Customer object
     */
    public function getCustomerByName($name);

}