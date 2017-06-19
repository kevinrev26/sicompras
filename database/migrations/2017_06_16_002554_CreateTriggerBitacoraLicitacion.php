<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerBitacoraLicitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
         CREATE TRIGGER TriggerBitacoraLicitacion
         AFTER INSERT
         ON licitacion FOR EACH ROW
         BEGIN
             INSERT INTO bitacora_licitacion
             VALUES(NEW.id,NOW(),NEW.id);
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
          DB::unprepared('DROP TRIGGER IF EXISTS `BitacoraLicitacion`');
    }
}
