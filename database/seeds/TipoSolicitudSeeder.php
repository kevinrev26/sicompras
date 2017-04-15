<?php

use Illuminate\Database\Seeder;

class TipoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('tipo_solicitud');
        $table->insert([
          'nombre_solicitud' => 'Solicitud de Compra'
        ]);
        $table->insert([
          'nombre_solicitud' => 'Solicitud de Mantenimiento'
        ]);
    }
}
