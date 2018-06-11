<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'AppController@index');

/*
 * How to check available discounts on an order.
 */
$router->get('/discounts', 'DiscountsController@validateDiscountRulesInformation');

/*
 * Route to get the eligible discounts for an order.
 */
$router->post('/discounts', 'DiscountsController@validateDiscountRules');
