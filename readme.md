# TL Challenge

TL Challenge was made on top of Laravel Lumen.
I could have made it using Slim too.

## Instalation

Download the source code and run 
* composer install

If you don't get the database.sqlite you just need to create the file database.sqlite inside database folder
and then run

* php artisan migrate:refresh --seed

## How i did it

Since the idea was to create a micro service to retrieve the eligible discounts for a given order i decided to use Lumen Framework by Laravel, instead of just Symfony components to speed up the process.

The same thing would be easily achived with another Framework like, Slim 3 or API Framework.

The core thing here was to make it the must maintainable i could. 
So i used the service container to bind the Data Provider and the Discount Processor on the app.
So it could be easily changed for another logic on the future, in order to do that it just had to implement DiscountProcessorInterface and DataProviderInterface.

I created an Order object to abstract the way the request come to us (by json, form, wtv), the important thing is to process the data and create an Order object.

To easily add new discount rules you just need to implement the interface DiscountRuleInterface and register that new class on the config file, 
you can find it on config/api.php.

To disable a Discount Rule you just need to remove it from the config file.

## Improvements

To improve the app, the result from the Discount Rules, must be more informative.

In the Discount Rules an improvement for best performance would be to change the way the product query are being done.
Instead of one query for each product, one query to retrieve all the products need, would be much better.
