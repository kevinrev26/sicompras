<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpParamOrdenesCompraSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $sql = <<<FinFunc
      CREATE PROCEDURE getOrdenes(IN _fecha VARCHAR(191), IN _id int(10))
      BEGIN
        SELECT * from orden_de_compra where fecha < _fecha OR id = _id;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS `getOrdenes`');
    }
}
