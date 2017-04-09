<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando la tabla departamento
        Schema::create('departamento', function (Blueprint $table){
          $table->string('codigo_departamento');
          $table->string('nombre_departamento');
          $table->integer('institucion')->unsigned();

          //Llave primaria
          $table->primary('codigo_departamento');
          //Llave foranea
          $table->foreign('institucion')->references('id_institucion')->on('institucion_gobierno');
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
        //$table->dropForeign('departamento_institucion_foreign');
        Schema::dropIfExists('departamento');
    }
}
