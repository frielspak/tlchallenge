<?php

namespace App\Logic\DiscountRules;

use App\Logic\Interfaces\DiscountRuleInterface;
use App\Logic\Interfaces\DataProviderInterface;
use Illuminate\Http\Request;

// A customer who has already bought for over € 1000, gets a discount of 10% on the whole order.
/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class OverAmount implements DiscountRuleInterface {

    const DESCRIPTION = 'Customer has already bought over 1000€ , making him eligible for 10% discount of the order total';
    const DISCOUNT = '10%';
    const DISCOUNT_AMOUNT = 0.1; // 10%

    private $dataProvider;

    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }



  /*
    If the order is not eligible for this discount it will return FALSE
    other way it will return the description, discount, amount (if applicable)

  public static function checkRule($orderData) {
    $result = FALSE;
    $customerId = $orderData->{'customer-id'};

    $databaseEmulator = DatabaseEmulator::getInstance();
    $customer = $databaseEmulator->getCustomerById($customerId);

    // A customer who has already bought for over € 1000
    if($customer->revenue > 1000){
      $discountAmount = doubleval($orderData->total) * self::DISCOUNT_AMOUNT;
      $newTotal = doubleval($orderData->total) - $discountAmount;
      $result = Responses::eligibleDiscount(self::DESCRIPTION, self::DISCOUNT, $discountAmount, $newTotal);
    }

    return $result;
  }
  */

    /**
     * Validate if the order is eligible for this discount rule.
     *
     * Return an array containing all the information about the discount or FALSE if the rule is not applicable.
     *
     * @param Request $order the order to be validated
     * @return array
     */
    public function validateRule(Request $order)
    {
        $result = FALSE;
        return ['c'];
    }
}

