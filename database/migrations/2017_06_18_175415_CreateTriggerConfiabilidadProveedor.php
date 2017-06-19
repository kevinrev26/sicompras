<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerConfiabilidadProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
         CREATE TRIGGER TriggerConfiabilidadProveedor
         BEFORE INSERT
         ON compra FOR EACH ROW
         BEGIN
            DECLARE msg varchar(128);
            DECLARE res boolean;
            Select proveedor.confiable FROM proveedor where proveedor.id=NEW.proveedor into res;
             if res = false THEN
                 SET msg="Ha ocurrido un error. El proveedor no es confiable";
                 SIGNAL SQLSTATE "45000" set MESSAGE_TEXT=msg;
             end if;
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
          DB::unprepared('DROP TRIGGER IF EXISTS `TriggerConfiabilidadProveedor`');
    }
}
