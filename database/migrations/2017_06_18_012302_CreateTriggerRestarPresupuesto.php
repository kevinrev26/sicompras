<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerRestarPresupuesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
        CREATE TRIGGER TriggerRestarPresupuesto
        AFTER INSERT
        ON orden_de_compra FOR EACH ROW
        BEGIN
            UPDATE institucion_gobierno SET    institucion_gobierno.presupuesto_institucion  = institucion_gobierno.presupuesto_institucion - (SELECT precio_oferta FROM oferta where oferta.id=NEW.oferta) WHERE institucion_gobierno.id =  (select t.id from (SELECT institucion_gobierno.id
            FROM users join orden_de_compra on users.id=orden_de_compra.usuario
                     join  departamento on departamento.codigo_departamento=users.departamento
                     join institucion_gobierno on institucion_gobierno.id=departamento.institucion

            WHERE orden_de_compra.id=(SELECT id FROM orden_de_compra where orden_de_compra.id = NEW.id)) t);
        END
       ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          DB::unprepared('DROP TRIGGER IF EXISTS `TriggerRestarPresupuesto`');
    }
}
