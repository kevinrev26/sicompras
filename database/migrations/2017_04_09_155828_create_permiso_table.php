<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('permiso', function (Blueprint $table){
          print "Permiso\n";
          $table->integer('id_rol')->unsigned();
          $table->integer('id_menu')->unsigned();

          //Llave primaria
          $table->primary(['id_rol', 'id_menu']);
          //llaves foraneas
          $table->foreign('id_rol')->references('id')->on('rol');
          $table->foreign('id_menu')->references('id')->on('menu');

        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('permiso');
        print "Permiso\n";
    }
}
