<?php

use Illuminate\Database\Seeder;
use App\Customer;
use Carbon\Carbon;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Clear the table and create customers.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();

        Customer::insert([
            [
                'id' => 1,
                'name' => 'Coca Cola',
                'since' => new Carbon('2014-06-28'),
                'revenue' => 492.12
            ],
            [
                'id' => 2,
                'name' => 'Teamleader',
                'since' => new Carbon('2015-01-15'),
                'revenue' => 1505.95
            ],
            [
                'id' => 3,
                'name' => 'Jeroen De Wit',
                'since' => new Carbon('2016-02-11'),
                'revenue' => 0
            ]
        ]);
    }
}
