<?php

namespace App\Logic\Processors;


use App\Logic\Interfaces\DiscountProcessorInterface;
use Illuminate\Http\Request;


class TeamleaderDiscountProcessor implements DiscountProcessorInterface
{

    /**
     * @var array containing the DiscountRules enabled.
     */
    private $enabledDiscountsRules;

    public function __construct($enabledDiscountsRules)
    {
        $this->enabledDiscountsRules = $enabledDiscountsRules;
    }


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
    public function processDiscounts(Request $order)
    {
        $result = [];

        foreach ($this->enabledDiscountsRules as $discountRule){
            $discountRule = new $discountRule();
            $result[] = $discountRule->validateRule($order);
        }

        return $result;
    }
}