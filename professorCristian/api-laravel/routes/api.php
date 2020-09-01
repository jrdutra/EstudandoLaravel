<?php

use Illuminate\Support\Facades\Route;

//Route::get('clientes', 'Api\ClienteApiController@index');
Route::apiResource('clientes', 'Api\ClienteApiController');