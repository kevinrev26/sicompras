<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpRestartBudgetLimit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      print "Procedimiento 1\n";
      $sql = <<<FinFunc
      CREATE PROCEDURE resetBudget()
      BEGIN
        UPDATE proveedor SET total_acumulado = 0.00;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS `resetBudget`');
    }
}
