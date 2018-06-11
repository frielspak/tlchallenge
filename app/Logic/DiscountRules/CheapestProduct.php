<?php

namespace App\Logic\DiscountRules;

use App\Logic\Interfaces\DiscountRuleInterface;
use App\Logic\Interfaces\DataProviderInterface;
use App\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class CheapestProduct implements DiscountRuleInterface {

    const DESCRIPTION = 'Customer bought 2 or more products of category Tools , making him eligible for 20% discount on the cheapest product';
    const DISCOUNT = '20% discount on the cheapest product';

    const TOOLS_CATEGORY_ID = 1;
    const MIN_REQUIRED_TO_DISCOUNT = 2; // Min number of products of the same category in the order to apply discount.

    private $dataProvider;

    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }


    /**
     * Validate if the order is eligible for this discount rule.
     *
     * Return an array containing all the information about the discount or FALSE if the rule is not applicable.
     *
     * @param Order $order the order to be validated
     * @return mixed
     */
    public function validateRule(Order $order)
    {
        // Perfomance can be improved by taking all the products need from the database with just one query.
        // Improvement - Return the id of the cheapest product.

        $result = FALSE;

        $eligibleItems = [];

        foreach ($order->getItems() as $item)
        {
            $product = $this->dataProvider->getProductById($item->getProductId());

            if($product->category == self::TOOLS_CATEGORY_ID)
            {
                $eligibleItems[] = $item;
            }
        }

        if(count($eligibleItems) >= self::MIN_REQUIRED_TO_DISCOUNT)
        {
            $result = [
                'description' => self::DESCRIPTION,
                'discount' => self::DISCOUNT
            ];
        }

        return $result;
    }
}
