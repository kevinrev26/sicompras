<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraLicitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //Creando la tabla
      Schema::create('bitacora_licitacion', function (Blueprint $table){
        print "Bitacora Licitacion\n";
        $table->increments('id_movimiento');
        $table->dateTime('fecha_creacion');
        $table->integer('licitacion')->unsigned();

        //Llave foranea
        $table->foreign('licitacion')->references('id')->on('licitacion');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('bitacora_licitacion');
    }
}
