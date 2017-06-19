<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenDeCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_de_compra', function (Blueprint $table) {
            print "Orden de compra\n";
            $table->increments('id');
            $table->string('fecha');
            $table->boolean('tecnico');
            $table->boolean('uaci');
            $table->boolean('jefe');
            $table->string('fecha_entrega');
            //foreaneas
            $table->integer('usuario')->unsigned();
            $table->integer('oferta')->unsigned();

            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('oferta')->references('id')->on('oferta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_de_compra');
        print "Orden de compra\n";
    }
}
