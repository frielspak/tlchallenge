<?php

namespace App\Logic\Processors;


use App\Logic\Interfaces\DataProviderInterface;
use App\Logic\Interfaces\DiscountProcessorInterface;
use App\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
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
     * Process all the enabled discounts for a certain order.
     *
     * Return an array containing all the discounts that can be applied to that order
     * or an empty array if none can be applied.
     *
     * @param Order $order the order to be processed
     * @param DataProviderInterface $dataProcessor provider
     * @return array
     */
    public function processDiscounts(Order $order, DataProviderInterface $dataProcessor)
    {
        $result = [];

        foreach ($this->enabledDiscountsRules as $discountRule){
            $discountRule = new $discountRule($dataProcessor);
            $validRule = $discountRule->validateRule($order);

            if($validRule)
            {
                $result[] = $validRule;
            }
        }

        return $result;
    }
}