<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('licitacion', function ( Blueprint $table ) {
          print "Licitacion\n";
          $table->increments('id');
          $table->string('nombre_convocatoria');
          $table->string('objeto',50);
          $table->string('informacion_adicional');
          $table->string('fuente_financiamiento');
          $table->string('estado',50);
          $table->string('tipo_licitacion');

          //foreaneas
          $table->integer('usuario')->unsigned();
          $table->integer('solicitud')->unsigned();

          $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('solicitud')->references('id')->on('solicitud')
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
        //
    }
}
