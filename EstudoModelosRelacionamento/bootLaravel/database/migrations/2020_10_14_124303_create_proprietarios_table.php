<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProprietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomedono', 50);
            $table->string('endereco', 100)->nullable($value = true);
            $table->string('bairro', 45)->nullable($value = true);
            $table->string('cpf', 45);
            $table->string('telefone', 45)->nullable($value = true);
            $table->string('rg', 45)->nullable($value = true);
            $table->date('dataNascimentoProp');
            //Chave estrangeira
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proprietarios');
    }
}
