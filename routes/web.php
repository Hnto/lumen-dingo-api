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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api'], function($api){
    //Show all available resources
    $api->get('/', 'IndexController@init');
    $api->get('/resources', 'IndexController@init');

    //Users api
    $api->get('/users/', 'IndexController@init');
    $api->get('/users/{id}', 'IndexController@init');

});
