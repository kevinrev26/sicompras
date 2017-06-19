<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoMantenimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_mantenimiento', function(Blueprint $table){
          print "tipo de mantenimiento\n";
          $table->increments('id');
          $table->string('nombre_mantenimiento',50);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_mantenimiento');
        print "Tipo de Mantenimiento\n";
    }
}
