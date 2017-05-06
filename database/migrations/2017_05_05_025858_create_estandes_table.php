<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estandes', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('participante_id')->unsigned();
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->string('nome'); 
            $table->text('descricao'); 
            $table->boolean('ativo');
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
        Schema::drop('estandes');
    }
}
