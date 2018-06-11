<?php

namespace App\Http\Controllers;

use App\Logic\Interfaces\DiscountProcessorInterface;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{

    /**
     * @return string information about how to use the /discounts route.
     */
    public function validateDiscountRulesInformation() {
        return 'To get discounts for an order post to /discounts';
    }

    /**
     * @param Request $order
     * @param DiscountProcessorInterface $discountProcessor The DiscountProcessor to be used to process this order.
     *
     * @return array A JSON Array with the eligible discounts will be sent.
     */
    public function validateDiscountRules(Request $order, DiscountProcessorInterface $discountProcessor) {
        return $discountProcessor->processDiscounts($order);
    }
}

