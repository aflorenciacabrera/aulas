<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('periodo_id')->unsigned();
            $table->integer('asignatura_id')->unsigned();
            $table->string('descripcion');
            $table->date('fecha');
            $table->string('hora_inicio');
            $table->string('hora_fin');


            $table->date('fecha_claseIni');
            $table->date('hora_claseInic');
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
        Schema::dropIfExists('reservas');
    }
}
