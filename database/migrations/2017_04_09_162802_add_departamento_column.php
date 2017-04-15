<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartamentoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table){
          print "Columna Departamento\n";
          $table->string('departamento');

          //Clave foranea
          $table->foreign('departamento')->references('codigo_departamento')->on('departamento');
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
        Schema::table('users', function (Blueprint $table) {
          $table->dropForeign('users_departamento_foreign');
        });
    }
}
