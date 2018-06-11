<?php

use App\Order;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class OrderTest extends TestCase
{
    /**
     * Test if $items was initialized as a Collection
     *
     */
    public function testOrderItemsInitialization()
    {
        $order = new Order();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $order->getItems());
        $this->assertEquals(0, $order->getItems()->count());
    }

    /**
     * Test the convertion from an Array
     *
     */
    public function testFromArray()
    {
        $orderJSON = '{"id":"1","customer-id":"2","items":[{"product-id":"B102","quantity":"10","unit-price":"4.99","total":"49.90"}],"total":"49.90"}';
        $orderArray = json_decode($orderJSON, true);

        $order = new Order();
        $order->fromArray($orderArray);

        $this->assertEquals(1, $order->getId());
        $this->assertEquals(2, $order->getCustomerId());
        $this->assertEquals(1, $order->getItems()->count());
        $this->assertInstanceOf(\App\Item::class, $order->getItems()->first());
        $this->assertEquals(49.90, $order->getTotal());
    }


}