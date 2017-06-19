<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Agregando la columna ROL, a la tabla usuers
        Schema::table('users', function (Blueprint $table){
          print "Columna Rol\n";
          $table->integer('rol')->unsigned()->default(1);

          //Clave foranea
          $table->foreign('rol')->references('id')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropForeign('users_rol_foreign');
        });
        print "Drop rol column\n";
    }
}
