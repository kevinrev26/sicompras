<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menu_item', function ( Blueprint $table ){
          $table->increments('id_menu_item');
          $table->string('nombre_item');
          $table->string('ruta');
          $table->integer('menu')->unsigned();
          //llave foranea
          $table->foreign('menu')->references('id_menu')->on('menu');
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
        Schema::dropIfExists('menu_item');
    }
}
