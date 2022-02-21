<?php

/** @var \Laravel\Lumen\Routing\Router $router */


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'news'], function () use ($router) {
        $router->get('/filters', 'NewsController@filters');
        $router->get('/', 'NewsController@index');
        $router->post('/', ['middleware' => 'auth', 'uses' => 'NewsController@store']);
        $router->get('/{id}', 'NewsController@show');
        $router->put('/{id}', ['middleware' => 'auth', 'uses' => 'NewsController@update']);
        $router->delete('/{id}', ['middleware' => 'auth', 'uses' => 'NewsController@destroy']);
    });

    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('/login', 'AuthController@login');
        $router->post('/', 'AuthController@store');
        $router->post('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logOut']);
    });

    $router->group(['prefix' => 'user'], function () use ($router) {
//        $router->post('/login', 'UserController@login');
//        $router->post('/logout', ['middleware' => 'auth','uses' =>'UserController@logOut']);
//        $router->post('/login', 'UserController@login');
//        $router->post('/', 'UserController@store');
//        $router->get('/{id}', 'UserController@show');
//        $router->put('/{id}', 'NewsController@update');
//        $router->delete('/{id}', 'NewsController@destroy');
    });
});
