<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_solicitud', function (Blueprint $table) {
          print "Detalle de Solicitud\n";
          $table->integer('id_solicitud')->unsigned();
          $table->integer('id_equipo')->unsigned();
          $table->integer('cantidad');

          $table->primary(['id_solicitud', 'id_equipo']);

          $table->foreign('id_solicitud')->references('id')->on('solicitud')
                          ->onDelete('cascade');
          $table->foreign('id_equipo')->references('id')->on('catalogo_equipo')
                          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_solicitud');
    }
}
