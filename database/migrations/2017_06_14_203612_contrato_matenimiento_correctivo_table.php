<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContratoMatenimientoCorrectivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_matenimiento_correctivo', function(Blueprint $table){
          $table->increments('id');
          $table->decimal('monto',12,2);
          $table->string('fecha_ejecucion');
          $table->boolean('finalizado');
          $table->integer('equipo')->unsigned();
          $table->integer('usuario')->unsigned();
          $table->integer('proveedor')->unsigned();

          $table->foreign('proveedor')->references('id')->on('proveedor');
          $table->foreign('usuario')->references('id')->on('users');
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
        Schema::dropIfExists('contrato_matenimiento_correctivo');
    }
}
