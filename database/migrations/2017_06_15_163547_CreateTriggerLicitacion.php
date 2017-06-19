<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerLicitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
         CREATE TRIGGER TriggerLicitacion
         BEFORE INSERT
         ON licitacion FOR EACH ROW
         BEGIN
           DECLARE tiempo int(10);
           DECLARE msg varchar(128);
           SELECT extract(hour from sysdate()) FROM DUAL INTO tiempo;
             if tiempo<8 OR tiempo>=16 THEN
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
      DB::unprepared('DROP TRIGGER IF EXISTS `TriggerLicitacion`');

    }
}
