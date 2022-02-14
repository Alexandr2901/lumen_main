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
//        $router->get('/post/{id}', ['middleware' => 'auth', function (Request $request, $id) {

        $router->get('/', 'NewsController@index');
//        $router->post('/', 'NewsController@store');
//        $router->post('/', ['middleware' => 'auth','NewsController@store']);
        $router->post('/', 'NewsController@store');

        $router->get('/{id}', 'NewsController@show');
        $router->put('/{id}', 'NewsController@update');
        $router->delete('/{id}', 'NewsController@destroy');
    });
    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('/login', 'UserController@login');
//        $router->post('/', ['middleware' => 'auth','NewsController@store']);
        $router->get('/{id}', 'UserController@show');
//        $router->put('/{id}', 'NewsController@update');
//        $router->delete('/{id}', 'NewsController@destroy');
    });
});
