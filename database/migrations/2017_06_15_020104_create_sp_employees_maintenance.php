<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpEmployeesMaintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      print "Procedimiento 2\n";
      $sql = <<<FinFunc
      CREATE PROCEDURE employeesMaintenance()
      BEGIN
        Select fecha_mantenimiento, nombre_completo, descripcion_mantenimiento, inv_equipo From empleado, bitacora_mantenimiento, equipo where bitacora_mantenimiento.equipo = equipo.id_equipo AND empleado.id = bitacora_mantenimiento.empleado;
      END;
FinFunc;
      DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `employeesMaintenance`');
    }
}
