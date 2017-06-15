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
          $table->integer('tipo_mantenimiento')->unsigned();
          $table->integer('empleado')->unsigned();

          $table->foreign('usuario')->references('id')->on('users');
          $table->foreign('tipo_mantenimiento')->references('id')->on('tipo_mantenimiento');
          $table->foreign('empleado')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_mantenimiento');
    }
}
