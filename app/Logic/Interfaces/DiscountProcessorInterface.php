<?php

namespace App\Logic\Interfaces;

use Illuminate\Http\Request;

interface DiscountProcessorInterface
{
    /**
     * @param Request $order the order to be processed
     *
     * Process all the enabled discounts for a certain order.
     *
     * Return an array containing all the discounts that can be applied to that order
     * or an empty array if none can be applied.
     *
     * @return array
     */
    public function processDiscounts(Request $order);
}