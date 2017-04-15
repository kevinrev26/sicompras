<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $table = DB::table('departamento');
      $table->insert([
        'codigo_departamento' => 'GESA',
        'nombre_departamento' => 'Departamento de Tecnología e Informática',
        'institucion' => 1,
      ]);
    }
}
