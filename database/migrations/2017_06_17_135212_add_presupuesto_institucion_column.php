<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPresupuestoInstitucionColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('institucion_gobierno', function (Blueprint $table) {
         print "Columna Presupuesto Institucion\n";
         $table->decimal('presupuesto_institucion',8,2);
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('institucion_gobierno', function (Blueprint $table) {
         $table->dropColumn('presupuesto_institucion');
       });
     }
}
