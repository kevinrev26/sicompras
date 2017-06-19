<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpEquipmentsMaintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      print "Procedimiento 3\n";
      $sql = <<<FinFunc
        CREATE PROCEDURE equipmentsMaintenance()
        BEGIN
        SELECT inv_equipo, nombre_equipo, tipo_mantenimiento FROM equipo, bitacora_mantenimiento, catalogo_equipo where equipo.id_equipo = bitacora_mantenimiento.equipo AND equipo.id_catalogo = catalogo_equipo.id;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS `equipmentsMaintenance`');
    }
}
