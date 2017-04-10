<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('menu');
        $table->insert([
          'nombre_menu' => 'Usuarios',
          'slug_menu' => 'usuario'
        ]);
        $table->insert([
          'nombre_menu' => 'Instituciones',
          'slug_menu' => 'institucion'
        ]);
        $table->insert([
          'nombre_menu' => 'Licitaciones',
          'slug_menu' => 'licitacion'
        ]);
        $table->insert([
          'nombre_menu' => 'Solicitudes',
          'slug_menu' => 'solicitud'
        ]);
        $table->insert([
          'nombre_menu' => 'Equipos',
          'slug_menu' => 'equipo'
        ]);
        $table->insert([
          'nombre_menu' => 'Ordenes de Compras',
          'slug_menu' => 'orden'
        ]);



    }
}
