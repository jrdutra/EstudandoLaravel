<?php


use Illuminate\Support\Facades\Route;
use App\User;
use App\Conteudo;
use App\Comentario;



Route::post('/cadastro', "UsuarioController@cadastro");

Route::post('/login', "UsuarioController@login");

Route::middleware('auth:api')->get('/usuario', "UsuarioController@usuario");

Route::middleware('auth:api')->put('/perfil', "UsuarioController@perfil");

Route::get('/testes', function(){
    $user = User::find(1);
    $user2 = User::find(5);
    //Criar conteudo
    /*
    $user->conteudos()->create([
        'titulo' => 'Conteúdo 2',
        'texto' => 'Aqui o texto do conteúdo',
        'imagem' => 'url da imagem',
        'link' => 'Link',
        'data' => '2020-09-25'
    ]);
    return $user->conteudos;
    */

    //Adicionar amigos
    /*
    $user->amigos()->toggle($user2->id);
    $user->amigos()->detach($user2->id);
    $user->amigos()->toggle($user2->id);

    return $user->amigos; */

    //Adicionar curtidas
    /*
    $conteudo = Conteudo::find(1);
    $user2->curtidas()->toggle($conteudo->id);

    //return $conteudo->curtidas()->count();
    return $conteudo->curtidas;*/

    //Novo comentario
    /*
    $conteudo = Conteudo::find(1);
    $user->comentarios()->create([
        'conteudo_id'=> $conteudo->id,
        'texto'=> 'Comentario 1',
        'data'=> date('Y-m-d')
    ]);
    $user2->comentarios()->create([
        'conteudo_id'=> $conteudo->id,
        'texto'=> 'Comentario 2',
        'data'=> date('Y-m-d')
    ]);
    return $conteudo->comentarios;*/
});
