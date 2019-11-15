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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// 'middleware' => 'auth'
$router->group(['prefix' => 'api',], function () use ($router) {

    // User Route Management
    $router->get('users', ['uses' => 'UserController@showAllUsers']);

    $router->get('users/{id}', ['uses' => 'UserController@showOneUser']);

    $router->post('users', ['uses' => 'UserController@create']);

    $router->delete('users/{id}', ['uses' => 'UserController@delete']);

    $router->put('users/{id}', ['uses' => 'UserController@update']);

    // Product Route Management
    $router->get('products', ['uses' => 'ProductController@showAllProducts']);

    $router->get('products/{id}', ['uses' => 'ProductController@showOneProduct']);

    $router->post('products', ['uses' => 'ProductController@create']);

    $router->delete('products/{id}', ['uses' => 'ProductController@delete']);

    $router->put('products/{id}', ['uses' => 'ProductController@update']);

    // Order Route Management
    $router->get('orders', ['uses' => 'OrderController@showAllOrders']);

    $router->get('orders_by_date/{condition}/{date}', ['uses' => 'OrderController@showOrdersByDate']);

    $router->get('orders_by_user_or_product_name/{name}', ['uses' => 'OrderController@showOrdersByUserOrProductName']);

    $router->get('orders/{id}', ['uses' => 'OrderController@showOneOrder']);

    $router->post('orders', ['uses' => 'OrderController@create']);

    $router->delete('orders/{id}', ['uses' => 'OrderController@delete']);

    $router->put('orders/{id}', ['uses' => 'OrderController@update']);
});
