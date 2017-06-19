<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
          print "Solicitud\n";
          $table->integer('id')->unsigned();
          $table->string('unidad_medida', 50);
          //$table->integer('cantidad')->unsigned();
          $table->string('especificaciones_tecnicas', 100);
          $table->float('precio_estimado',8,2);
          $table->string('forma_entrega',50);
          $table->string('lugar_entrega',50);
          $table->boolean('estado');
          //Foraneas
          $table->integer('usuario')->unsigned();
          //llave primaria
          $table->primary('id');

          $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
}
