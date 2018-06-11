<?php

namespace App\Logic\DiscountRules;

use App\Logic\Interfaces\DiscountRuleInterface;
use App\Logic\Interfaces\DataProviderInterface;
use Illuminate\Http\Request;

// For every product of category "Switches" (id 2), when you buy five, you get a sixth for free.
/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class AditionalForFree implements DiscountRuleInterface {

    const DESCRIPTION = 'Customer bought 5 or more products of category Switches , making him eligible for a sixth for free';
    const DISCOUNT = 'Items eligible for a sixth for free: %s';

    const SWITCHES_CATEGORY_ID = 2;
    const MIN_REQUIRED_TO_DISCOUNT = 5; // Min items quantity to apply discount.

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
    $items = $orderData->items;

    $resultAux = [];

    foreach($items as $item) {
      // Check product category
      $databaseEmulator = DatabaseEmulator::getInstance();
      $product = $databaseEmulator->getProductById($item->{'product-id'});

      if($product->category == self::SWITCHES_CATEGORY_ID && $item->quantity >= self::MIN_REQUIRED_TO_DISCOUNT) {
        $resultAux[] = $item;
      }
    }

    if(count($resultAux) > 0) {
      $productsIdList = self::productsArrayToStringIdsList($resultAux);
      $result = Responses::eligibleDiscount(self::DESCRIPTION, sprintf(self::DISCOUNT, $productsIdList), $discountAmount, $orderData->total);
    }

    return $result;
  }

  private function productsArrayToStringIdsList($productsArray) {
    $result = "";

    foreach($productsArray as $product) {
      $result .= $product->{'product-id'} . " ";
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
      return ['a'];
    }
}
