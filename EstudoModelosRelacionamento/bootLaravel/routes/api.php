<?php

use Illuminate\Support\Facades\Route;

Route::post('/cadastro', "UsuarioController@cadastro");
Route::post('/login', "UsuarioController@login");