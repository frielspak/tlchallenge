<?php

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */

return [
    'enabled_discounts_rules' => [
        App\Logic\DiscountRules\AditionalForFree::class,
        App\Logic\DiscountRules\CheapestProduct::class,
        App\Logic\DiscountRules\OverAmount::class
    ]
];
