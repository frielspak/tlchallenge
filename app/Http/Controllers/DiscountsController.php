<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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
     * @param Request $orderRequest
     * @param DiscountProcessorInterface $discountProcessor The DiscountProcessor to be used to process this order.
     * @param DataProviderInterface $dataProvider The data provider used to get information about customers and products.
     *
     * @return mixed A JSON Array with the eligible discounts will be sent.
     */
    public function validateDiscountRules(Request $orderRequest, DiscountProcessorInterface $discountProcessor,
                                          DataProviderInterface $dataProvider) {

        $validator = Validator::make($orderRequest->all(), [
            'id' => 'required',
            'customer-id' => 'required',
            'items' => 'required',
            'total' => 'required'
        ]);

        if($validator->fails()){
            return 'Order information must be provided';
        }

        $order = new Order();
        $order->fromArray($orderRequest->all());

        return $discountProcessor->processDiscounts($order, $dataProvider);
    }
}

