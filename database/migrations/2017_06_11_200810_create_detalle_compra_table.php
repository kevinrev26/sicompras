<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            print "Detalle de compra\n";
            $table->integer('id_orden')->unsigned();
            $table->integer('id_equipo')->unsigned();

            $table->primary(['id_orden','id_equipo']);

            //llaves
            $table->foreign('id_orden')->references('id')->on('orden_de_compra')
                            ->onDelete('cascade');
            $table->foreign('id_equipo')->references('id')->on('catalogo_equipo')
                            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compra');
        print "Detalle de compra\n";
    }
}
