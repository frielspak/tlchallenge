<?php

namespace App\Logic\DiscountRules;

use App\Logic\Interfaces\DiscountRuleInterface;
use App\Logic\Interfaces\DataProviderInterface;
use Illuminate\Http\Request;

// If you buy two or more products of category "Tools" (id 1), you get a 20% discount on the cheapest product.
/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class CheapestProduct implements DiscountRuleInterface {

    const DESCRIPTION = 'Customer bought 2 or more products of category Tools , making him eligible for 20% discount on the cheapest product';
    const DISCOUNT = '20%% on the cheapest (%s)';

    const TOOLS_CATEGORY_ID = 1;
    const DISCOUNT_AMOUNT = 0.2; // 20%
    const MIN_REQUIRED_TO_DISCOUNT = 2; // Min number of products of the same category in the order to apply discount.

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

    $resultAux = [
      "count" => 0,
      "product" => NULL
    ];

    foreach($items as $item) {
      // Check product category
      $databaseEmulator = DatabaseEmulator::getInstance();
      $product = $databaseEmulator->getProductById($item->{'product-id'});

      if($product->category == self::TOOLS_CATEGORY_ID) {
        $resultAux["count"]++;

        if($resultAux["product"] != NULL) {
          if(doubleval($product->price) < doubleval($resultAux["product"]->price)) {
            $resultAux["product"] = $product;
          }
        } else {
          $resultAux["product"] = $product;
        }
      }
    }

    // Check if there was 2 or more products of the same category id
    if($resultAux["count"] >= self::MIN_REQUIRED_TO_DISCOUNT) {
      $discountAmount = doubleval($resultAux["product"]->price) * self::DISCOUNT_AMOUNT;
      $newTotal = doubleval($orderData->total) - $discountAmount;
      $result = Responses::eligibleDiscount(self::DESCRIPTION, sprintf(self::DISCOUNT, $resultAux["product"]->id), $discountAmount, $newTotal);
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
        return ['b'];
    }
}
