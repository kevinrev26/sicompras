<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpBitacora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      print "Procedimiento 4\n";
      $sql = <<<FinFunc
        CREATE PROCEDURE consultaBitacora(IN _fecha VARCHAR(50))
        BEGIN
        SELECT * FROM bitacora_mantenimiento WHERE fecha_mantenimiento >= _fecha;
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
