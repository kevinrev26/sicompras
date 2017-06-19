<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_equipo', function ( Blueprint $table ) {
          print "Catalago de Equipo\n";
          $table->increments('id');
          $table->string('nombre_equipo');
          $table->string('descripcion_equipo');
          $table->string('unidad_potencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo_equipo');
        print "Catalogo de Equipo\n";
    }
}
