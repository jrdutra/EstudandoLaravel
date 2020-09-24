<?php

use Illuminate\Support\Facades\Route;

Route::post('/cadastro', "UsuarioController@cadastro");

Route::post('/login', "UsuarioController@login");

Route::middleware('auth:api')->get('/usuario', "UsuarioController@usuario");

Route::middleware('auth:api')->put('/perfil', "UsuarioController@perfil");
