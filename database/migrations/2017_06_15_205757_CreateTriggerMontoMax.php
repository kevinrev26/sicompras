<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerMontoMax extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
         CREATE TRIGGER TriggerMontoMax
         BEFORE INSERT
         ON solicitud FOR EACH ROW
         BEGIN
           DECLARE msg varchar(128);
             if NEW.precio_estimado > 50000 THEN
               SET msg="Ha ocurrido un error";
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
          DB::unprepared('DROP TRIGGER IF EXISTS `TriggerMontoMax`');
    }
}
