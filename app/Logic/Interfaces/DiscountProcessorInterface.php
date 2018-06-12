<?php

namespace App\Logic\Interfaces;

use App\Models\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
interface DiscountProcessorInterface
{
    /**
     * Process all the enabled discounts for a certain order.
     *
     * Return an array containing all the discounts that can be applied to that order
     * or an empty array if none can be applied.
     *
     * @param Order $order the order to be processed
     * @param DataProviderInterface $dataProvider provider
     * @return array
     */
    public function processDiscounts(Order $order, DataProviderInterface $dataProvider);
}