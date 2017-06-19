<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            print "Compra\n";
            $table->increments('id');
            $table->string('fecha_compra');

            //Llaves foraneas
            $table->integer('proveedor')->unsigned();
            $table->integer('orden_compra')->unsigned();

            //Relaciones
            $table->foreign('proveedor')->references('id')->on('proveedor');
            $table->foreign('orden_compra')->references('id')->on('orden_de_compra');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
        print "Compra\n";
    }
}
