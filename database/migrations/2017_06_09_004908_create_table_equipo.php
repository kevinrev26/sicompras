<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEquipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('equipo', function(Blueprint $table){
        print "Equipo\n";
        $table->increments('id_equipo');
        $table->string('inv_equipo', 10)->unique();
        $table->string('marca', 50);
        $table->string('modelo', 50);
        $table->float('precio_equipo');
        $table->integer('id_catalogo')->unsigned();
        $table->string('id_departamento');

        //Llaves foraneas
        $table->foreign('id_catalogo')->references('id')->on('catalogo_equipo');
        $table->foreign('id_departamento')->references('codigo_departamento')->on('departamento');
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
