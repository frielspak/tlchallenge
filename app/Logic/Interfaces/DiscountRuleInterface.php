<?php

namespace App\Logic\Interfaces;

use Illuminate\Http\Request;

interface DiscountRuleInterface
{
    /**
     * @param Request $order the order to be validated
     *
     * Validate if the order is eligible for this discount rule.
     *
     * Return an array containing all the information about the discount or FALSE if the rule is not applicable.
     *
     * @return array
     */
    public function validateRule(Request $order);
}