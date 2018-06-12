<?php

namespace App\Logic\Interfaces;

use App\Models\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
interface DiscountRuleInterface
{
    /**
     * Validate if the order is eligible for this discount rule.
     *
     * Return an array containing all the information about the discount or FALSE if the rule is not applicable.
     *
     * @param Order $order the order to be validated
     * @return array
     */
    public function validateRule(Order $order);
}