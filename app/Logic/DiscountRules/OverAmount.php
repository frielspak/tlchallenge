<?php

namespace App\Logic\DiscountRules;

use App\Logic\Interfaces\DiscountRuleInterface;
use App\Logic\Interfaces\DataProviderInterface;
use App\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class OverAmount implements DiscountRuleInterface {

    const DESCRIPTION = 'Customer has already bought over 1000€ , making him eligible for 10% discount of the total order';
    const DISCOUNT = '10% on the whole order';

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
        $result = FALSE;

        $costumer = $this->dataProvider->getCustomerById($order->getCustomerId());

        if($costumer)
        {
            if($costumer->revenue > 1000)
            {
                $result = [
                    'description' => self::DESCRIPTION,
                    'discount' => self::DISCOUNT
                ];
            }
        }

        return $result;
    }
}

