<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpParamSolicitudesSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $sql = <<<FinFunc
      CREATE PROCEDURE getSolicitudes(IN _id int(10), IN _precio double(8,2), IN _lugar VARCHAR(50))
      BEGIN
        SELECT * from solicitud where id = _id or precio_estimado <= _precio OR lugar_entrega like CONCAT('%',_lugar,'%');
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
