<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Laravel\Passport\HasApiTokens;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function login(Request $request){
        $data = $request->all();


        $validacao = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if ($validacao->fails()) {
            return ['status' => false, "validacao"=>true, "erros"=>$validacao->errors()];
        }

        if (Auth::attempt(['email' => $data['email'], 'password' =>  $data['password']])) {
            $user = auth()->user();
            $user->token = $user->createToken($user->email)->accessToken;
            //$user->imagem = asset($user->imagem);
            return ['status' => true, 'usuario' => $user];
        } else {
            return ['status' => false];
        }
    }

    public function cadastro(Request $request){
        $data = $request->all();

        $validacao = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validacao->fails()) {
            return ['status' => false, "validacao"=>true, "erros"=>$validacao->errors()];
        }

        $imagem = "/perfis/padrao.jpg";


        $user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'imagem' => $imagem
            ]
        );
        //$user->imagem = asset($user->imagem);
        $user->token = $user->createToken($user->email)->accessToken;

        return ['status' => true, 'usuario' => $user];
    }

}
