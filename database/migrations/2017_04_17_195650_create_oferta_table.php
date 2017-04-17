<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta', function (Blueprint $table) {
          print "oferta\n";
          $table->increments('id');
          $table->float('precio_oferta');
          $table->string('descripcion_oferta');
          $table->string('foto_equipo');
          $table->integer('licitacion')->unsigned();
          $table->integer('proveedor')->unsigned();

          //foreneas
          $table->foreign('licitacion')->references('id')->on('licitacion');
          $table->foreign('proveedor')->references('id')->on('proveedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta');
    }
}
