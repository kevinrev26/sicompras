<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proveedor', function (Blueprint $table) {
          print "Proveedor\n";
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('nit')->unique();
          $table->boolean('tipo_persona');
          $table->string('representante');
          $table->integer('rol')->unsigned()->default(6);
          $table->rememberToken();
          $table->timestamps();

          //foreign
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
        Schema::dropIfExists('proveedor');
    }
}
