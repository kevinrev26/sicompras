<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContratoMatenimientoPreventivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contrato_matenimiento_preventivo', function(Blueprint $table){
        print "contrato preventio\n";
        $table->increments('id');
        $table->decimal('monto',12,2);
        $table->string('forma_pago');
        $table->string('vigencia');
        $table->string('fecha_inicio');
        $table->string('fecha_fin');
        $table->string('fecha');
        $table->integer('plazo');
        $table->integer('equipo')->unsigned();
        $table->integer('catalogo_equipo')->unsigned();



        $table->foreign('catalogo_equipo')->references('id')->on('catalogo_equipo');
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
        print "Contrato de Mantenimiento Preventivo\n";
        Schema::dropIfExists('contrato_matenimiento_preventivo');
    }
}
