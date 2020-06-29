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

$router->get('/mobil','ControllerMobil@index');
$router->get('/mobil/{id}', 'ControllerMobil@read');
$router->post('/mobil', 'ControllerMobil@Create');
$router->put('/mobil/{id}', 'ControllerMobil@update');
$router->delete('/mobil/{id}','ControllerMobil@delete');

$router->get('/user','ControllerPenyewa@index');
$router->get('/user/{id}', 'ControllerPenyewa@read');
$router->post('/user', 'ControllerPenyewa@Create');
$router->put('/user/{id}', 'ControllerPenyewa@update');
$router->delete('/user/{id}','ControllerPenyewa@delete');

$router->get('/sewa','ControllerSewa@index');
$router->get('/sewa/{id}', 'ControllerSewa@read');
$router->post('/sewa', 'ControllerSewa@create');
$router->put('/sewa/{id}', 'ControllerSewa@update');
$router->delete('/sewa/{id}','ControllerSewa@delete');