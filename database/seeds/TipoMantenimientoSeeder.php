<?php

use Illuminate\Database\Seeder;
use App\Modelos\TipoMantenimiento;


class TipoMantenimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nuevo = new TipoMantenimiento();
        $nuevo->nombre_mantenimiento = 'CORRECTIVO';
        $nuevo->save();
        $nuevo = new TipoMantenimiento();
        $nuevo->nombre_mantenimiento = 'PREVENTIVO';
        $nuevo->save();
    }
}
