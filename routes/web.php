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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('homebridgeConfig',  ['uses' => 'homebridgeConfigController@getConfig']);
    $router->get('homebridgeSchema',  ['uses' => 'homebridgeConfigController@getSchema']);
    $router->post('homebridgeConfig', ['uses' => 'homebridgeConfigController@writeConfig']);
    $router->delete('homebridgeConfig', ['uses' => 'homebridgeConfigController@resetConfig']);


    $router->get('BridgeInformations',  ['uses' => 'homebridgeConfigController@getBridgeInformations']);
});
