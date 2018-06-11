<?php

namespace App\Logic\Interfaces;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
interface DataProviderInterface
{
    /**
     * Get customer by id.
     *
     * @param $id Customer Id
     * @return mixed Customer object
     */
    public function getCustomerById($id);

    /**
     * Get customer by name.
     *
     * @param $name Customer Name
     * @return mixed Customer object
     */
    public function getCustomerByName($name);

}