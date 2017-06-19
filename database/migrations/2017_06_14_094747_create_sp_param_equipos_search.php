<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpParamEquiposSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      print "Procedimiento 0\n";
        $sql = <<<FinFunc
        CREATE PROCEDURE getEquipments(IN _nombre VARCHAR(191), IN _unidad VARCHAR(191))
        BEGIN
          SELECT * from catalogo_equipo where nombre_equipo like CONCAT('%',_nombre,'%') OR unidad_potencia = _unidad;
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

    }
}
