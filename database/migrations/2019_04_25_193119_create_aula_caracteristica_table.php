<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaCaracteristicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_caracteristica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aula_id')->unsigned();
            $table->integer('caracteristica_id')->unsigned();


            $table->timestamps();
            //Relaciones entre tablas 
             $table->foreign('aula_id')->references('id')->on('aulas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_caracteristica');
    }
}
