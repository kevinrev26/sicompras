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
        ]);
        $table->insert([
          'nombre_institucion' => 'Asociación Nacional de Acuedúctos y Alcantarillados',
          'logo_institucion' => 'images/anda.jpg',
        ]);
        $table->insert([
          'nombre_institucion' => 'Banco Central de Reserva',
          'logo_institucion' => 'images/bcr.png',
        ]);
        $table->insert([
          'nombre_institucion' => 'Centro Nacional de Registros',
          'logo_institucion' => 'images/cnr.png',
        ]);
        $table->insert([
          'nombre_institucion' => 'Ministerio de Hacienda',
          'logo_institucion' => 'images/mh.jpg',
        ]);
    }
}
