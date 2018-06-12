<?php

namespace App\Logic\DiscountRules;

use App\Logic\Interfaces\DiscountRuleInterface;
use App\Logic\Interfaces\DataProviderInterface;
use App\Models\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class AdditionalForFree implements DiscountRuleInterface {

    const DESCRIPTION = 'For every 5 items of the same product from category Switches, customers will get a sixth for free';
    const DISCOUNT = 'Sixth for free';

    const SWITCHES_CATEGORY_ID = 2;
    const MIN_REQUIRED_TO_DISCOUNT = 5; // Min items quantity to apply discount.

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
        // Improvement - Return the id of the products that are eligible for discount.

        $result = FALSE;

        $eligibleItems = [];

        foreach ($order->getItems() as $item)
        {
            $product = $this->dataProvider->getProductById($item->getProductId());

            if($product->category == self::SWITCHES_CATEGORY_ID && $item->getQuantity() >= self::MIN_REQUIRED_TO_DISCOUNT)
            {
                $eligibleItems[] = $item;
            }
        }

        if(count($eligibleItems) > 0)
        {
            $result = [
                'description' => self::DESCRIPTION,
                'discount' => self::DISCOUNT
            ];
        }

        return $result;
    }
}
