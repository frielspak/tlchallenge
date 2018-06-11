<?php

namespace App\Http\Controllers;

use App\Logic\Interfaces\DataProviderInterface;
use App\Logic\Interfaces\DiscountProcessorInterface;
use Illuminate\Http\Request;
use App\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
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
     * @param DataProviderInterface $dataProvider The data provider used to get information about customers and products.
     *
     * @return array A JSON Array with the eligible discounts will be sent.
     */
    public function validateDiscountRules(Request $orderRequest, DiscountProcessorInterface $discountProcessor,
                                          DataProviderInterface $dataProvider) {

        $order = new Order();
        $order->fromRequest($orderRequest);

        return $discountProcessor->processDiscounts($order, $dataProvider);
    }
}

