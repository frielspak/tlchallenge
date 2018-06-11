<?php

use App\Logic\Interfaces\DataProviderInterface;
use Carbon\Carbon;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class DataProviderTest extends TestCase
{
    /**
     * Test get customer by id with valid id
     *
     */
    public function testGetCustomerByIdWithValidId()
    {
        $dataProvider = $this->app->make(DataProviderInterface::class);

        $customer = $dataProvider->getCustomerById(1);

        $this->assertNotNull($dataProvider);
        $this->assertNotNull($customer);

        $this->assertEquals(1, $customer->id);
        $this->assertEquals('Coca Cola', $customer->name);
        $this->assertEquals(new Carbon('2014-06-28'), $customer->since);
        $this->assertEquals(492.12, $customer->revenue);
    }

    /**
     * Test get customer by id with invalid id
     *
     */
    public function testGetCustomerByIdWithInvalidId()
    {
        $dataProvider = $this->app->make(DataProviderInterface::class);

        $customer = $dataProvider->getCustomerById(20);

        $this->assertNotNull($dataProvider);
        $this->assertNull($customer);
    }
}