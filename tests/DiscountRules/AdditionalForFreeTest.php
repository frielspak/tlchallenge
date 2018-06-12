<?php

use App\Logic\DiscountRules\AdditionalForFree;
use App\Logic\Interfaces\DataProviderInterface;
use App\Models\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class AdditionalForFreeTest extends TestCase
{
    /**
     * Test Validate Rule with a valid order
     *
     */
    public function testValidateRuleWithValidOrder()
    {
        $orderJSON = '{"id":"1","customer-id":"1","items":[{"product-id":"B102","quantity":"10","unit-price":"4.99","total":"49.90"}],"total":"49.90"}';
        $orderArray = json_decode($orderJSON, true);

        $aditionalForFree = new AdditionalForFree($this->app->make(DataProviderInterface::class));

        $order = new Order();
        $order->fromArray($orderArray);

        $result = $aditionalForFree->validateRule($order);

        $expected = [
            'description' => 'Customer bought 5 or more items of the same product from category Switches, making him eligible for a sixth for free',
            'discount' => 'Sixth for free'
        ];

        $this->assertNotFalse($result);
        $this->assertEquals($expected, $result);
    }

    /**
     * Test Validate Rule with a valid order
     *
     */
    public function testValidateRuleWithInvalidOrder()
    {
        $orderJSON = '{"id":"2","customer-id":"2","items":[{"product-id":"B102","quantity":"2","unit-price":"4.99","total":"49.90"}],"total":"70.55"}';
        $orderArray = json_decode($orderJSON, true);

        $aditionalForFree = new AdditionalForFree($this->app->make(DataProviderInterface::class));

        $order = new Order();
        $order->fromArray($orderArray);

        $result = $aditionalForFree->validateRule($order);

        $this->assertFalse($result);
    }
}