<?php

use App\Item;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class ItemTest extends TestCase
{

    /**
     * Test the convertion from an Array
     *
     */
    public function testFromArray()
    {
        $orderJSON = '{"id":"1","customer-id":"2","items":[{"product-id":"B102","quantity":"10","unit-price":"4.99","total":"49.90"}],"total":"49.90"}';
        $orderArray = json_decode($orderJSON, true);

        $item = new Item();
        $item->fromArray($orderArray['items'][0]);

        $this->assertEquals('B102', $item->getProductId());
        $this->assertEquals(10, $item->getQuantity());
        $this->assertEquals(4.99, $item->getUnitPrice());
        $this->assertEquals(49.90, $item->getTotal());
    }
}