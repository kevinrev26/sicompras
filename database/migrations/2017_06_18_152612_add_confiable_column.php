<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfiableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('proveedor', function (Blueprint $table) {
        print "Columna Confiable\n";
       $table->boolean('confiable');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('proveedor', function (Blueprint $table) {
        $table->dropColumn('confiable');
      });
    }
}
