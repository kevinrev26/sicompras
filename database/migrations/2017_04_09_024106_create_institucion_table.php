<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando la tabla institucion.
        Schema::create('institucion_gobierno', function ( Blueprint $table ){
          $table->increments('id_institucion');
          $table->string('nombre_institucion');
          $table->string('logo_institucion'); //Se guardara la ruta a la imagen del logo.
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
        Schema::dropIfExists('institucion_gobierno');
    }
}
