<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BitacoraMantenimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_mantenimiento', function(Blueprint $table){
          $table->increments('id');
          $table->string('fecha_mantenimiento');
          $table->string('descripcion_mantenimiento');
          $table->string('imagen');
          $table->integer('usuario')->unsigned();
          $table->string('tipo_mantenimiento');
          $table->integer('empleado')->unsigned();
          $table->integer('equipo')->unsigned();

          $table->foreign('usuario')->references('id')->on('users');
          //$table->foreign('tipo_mantenimiento')->references('id')->on('tipo_mantenimiento');
          $table->foreign('empleado')->references('id')->on('empleado');
          $table->foreign('equipo')->references('id_equipo')->on('equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        print "Bitacora de Mantenimiento\n";
        Schema::dropIfExists('bitacora_mantenimiento');
    }
}
