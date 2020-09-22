<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Validator;


Route::post('/cadastro', function (Request $request) {
    $data = $request->all();

    $validacao = Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    if($validacao->fails()){

        return $validacao->errors();

    }

    $user = User::create(
        [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]
    );

    $user->token = $user->createToken($user->email)->accessToken;

    return $user;
});

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});
