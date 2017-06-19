<?php

use Illuminate\Database\Seeder;
//use App\Modelos\InstitucionGobierno;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('institucion_gobierno');
        $table->insert([
          'nombre_institucion' => 'Gobierno de El Salvador',
          'logo_institucion' => 'images/esa.png',
          'presupuesto_institucion'=> 100000.50,

        ]);
        $table->insert([
          'nombre_institucion' => 'Asociación Nacional de Acuedúctos y Alcantarillados',
          'logo_institucion' => 'images/anda.jpg',
          'presupuesto_institucion'=> 180000.0,
        ]);
        $table->insert([
          'nombre_institucion' => 'Banco Central de Reserva',
          'logo_institucion' => 'images/bcr.png',
          'presupuesto_institucion'=> 200000.45,
        ]);
        $table->insert([
          'nombre_institucion' => 'Centro Nacional de Registros',
          'logo_institucion' => 'images/cnr.png',
          'presupuesto_institucion'=> 200000.50,
        ]);
        $table->insert([
          'nombre_institucion' => 'Ministerio de Hacienda',
          'logo_institucion' => 'images/mh.jpg',
          'presupuesto_institucion'=> 300000.00,
        ]);
    }
}
