# Adcash Order Manager (Back End)

>Back end application of the Adcash Order Manager

### Tech

* PHP
* Lumen REST
* MySQL
* Auth0

### Installation

Clone the repository `https://github.com/chanakaDe/adcash-back-end.git`

cd in `adcash-back-end`

You need to create a database in your MySQL instance named `adcash_db`

Change MySQL server information in `.env` file.

Finally run `php artisan migrate`

You can see 3 data tables in your MySQL database.

To test the server, use `php -S localhost:8000 -t public`

## License

The Adcash Order Manager (Back End) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
