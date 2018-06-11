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
     * @param int $id Customer Id
     * @return mixed Customer object
     */
    public function getCustomerById($id);

    /**
     * Get customer by name.
     *
     * @param string $name Customer Name
     * @return mixed Customer object
     */
    public function getCustomerByName($name);

    /**
     * Get product by id.
     *
     * @param string $id Product Id
     * @return mixed Product object
     */
    public function getProductById($id);

    /**
     * Get multiple products by id.
     *
     * @param array $ids Product Ids
     * @return mixed Product objects
     */
    public function getProductsByIds($ids);

}