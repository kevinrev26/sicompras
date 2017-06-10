<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSolictudMantenimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


      Schema::create('solicitud_mantenimiento', function(Blueprint $table){
        print "Solicitud de Mantenimiento\n";
        $table->integer('id_sol_mant')->unsigned();
        $table->float('presupuesto',8,2);
        $table->dateTime('fecha_creacion');
        $table->string('equipo');
        $table->integer('usuario')->unsigned();

        //Llave primaria
        $table->primary('id_sol_mant');
        //Llave foranea
        $table->foreign('equipo')->references('inv_equipo')->on('equipo');
        $table->foreign('usuario')->references('id')->on('users');
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
