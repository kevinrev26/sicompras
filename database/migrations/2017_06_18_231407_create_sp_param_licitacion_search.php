<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpParamLicitacionSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $sql = <<<FinFunc
      CREATE PROCEDURE getLicitaciones(IN _id int(10), IN _titulo VARCHAR(191))
      BEGIN
        SELECT * from licitacion where id = _id OR nombre_convocatoria like CONCAT('%',_titulo,'%');
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
        DB::unprepared('DROP PROCEDURE IF EXISTS `getLicitaciones`');
    }
}
