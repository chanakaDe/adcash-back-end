# Adcash Order Manager (Back End)

>Back end application of the Adcash Order Manager

### Tech

* PHP
* Lumen REST
* MySQL
* Auth0

>This application is created using latest SOA architecture. This REST API can be hosted in a seperate server independently and can be connected to a remote database instance. 

### Installation

Clone the repository `https://github.com/chanakaDe/adcash-back-end.git`

cd in `adcash-back-end`

You need to create a database in your MySQL instance named `adcash_db`

Change MySQL server information in `.env` file.

Finally run `php artisan migrate`

You can see 3 data tables in your MySQL database.

To test the server, use `php -S localhost:8000 -t public`

### Developer Note

This API is secured with Auth0 using middleware.
For the testing and demo purposes, I have not used Auth0 middleware at the moment. 
**[Auth0Middleware.php](https://github.com/chanakaDe/adcash-back-end/blob/master/app/Http/Middleware/Auth0Middleware.php)**

To test with Auth0 authentication, please add `'middleware' => 'auth'` in the `/routes/web.php` file. 
**[web.php](https://github.com/chanakaDe/adcash-back-end/blob/master/routes/web.php)**

All the test cases in stored in the `/tests` directory. 
I have tested all the test cases with using Auth0. 
**[OrdersTest.php](https://github.com/chanakaDe/adcash-back-end/blob/master/tests/OrdersTest.php)**


## License

The Adcash Order Manager (Back End) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
