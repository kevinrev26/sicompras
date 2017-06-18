<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerBitacoraMantenimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $sql = <<<FinFunc
      CREATE TRIGGER updateContract AFTER INSERT ON bitacora_mantenimiento
      FOR EACH ROW
      BEGIN
        IF NEW.tipo_mantenimiento == 'Preventivo' THEN
          UPDATE contrato_matenimiento_preventivo SET contrato_matenimiento_preventivo.plazo = contrato_matenimiento_preventivo.plazo - 1 WHERE contrato_matenimiento_preventivo.id = (SELECT * FROM (SELECT DISTINCT(contrato_matenimiento_preventivo.id) FROM bitacora_mantenimiento join equipo on bitacora_mantenimiento.equipo = equipo.id_equipo join catalogo_equipo on equipo.id_catalogo = catalogo_equipo.id join contrato_matenimiento_preventivo on contrato_matenimiento_preventivo.catalogo_equipo = catalogo_equipo.id WHERE contrato_matenimiento_preventivo.equipo = NEW.equipo) t);
        END IF;
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
        //
    }
}
