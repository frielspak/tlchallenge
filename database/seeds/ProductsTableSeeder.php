<?php

use Illuminate\Database\Seeder;
use App\Product;

/**
 * @author  Ricardo Malveiro <r1do@csrcon.info>
 */
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Clear the table and create products.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        Product::insert([
            [
                'id' => 'A101',
                'description' => 'Screwdriver',
                'category' => 1,
                'price' => 9.75
            ],
            [
                'id' => 'A102',
                'description' => 'Electric screwdriver',
                'category' => 1,
                'price' => 49.50
            ],
            [
                'id' => 'B101',
                'description' => 'Basic on-off switch',
                'category' => 2,
                'price' => 4.99
            ],
            [
                'id' => 'B102',
                'description' => 'Press button',
                'category' => 2,
                'price' => 4.99
            ],
            [
                'id' => 'B103',
                'description' => 'Switch with motion detector',
                'category' => 2,
                'price' => 12.95
            ]
        ]);
    }
}
