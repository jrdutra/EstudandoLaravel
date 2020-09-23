<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\UsuarioController;


Route::post('/cadastro', "UsuarioController@cadastro");

Route::post('/login', "UsuarioController@login");

Route::middleware('auth:api')->get('/usuario', "UsuarioController@usuario");

Route::middleware('auth:api')->put('/perfil', "UsuarioController@perfil");
