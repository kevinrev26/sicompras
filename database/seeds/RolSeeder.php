<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('rol');
        $table->insert([
          'nombre_rol' => 'Usuario',
          'slug_rol' => 'usuario',
          'descripcion_rol' => 'Este rol no posee ninguna funcionalidad.',
        ]);
        $table->insert([
          'nombre_rol' => 'Administrador',
          'slug_rol' => 'administrador',
          'descripcion_rol' => 'Posee todo el acceso al sistema.',
        ]);
        $table->insert([
          'nombre_rol' => 'Jefe de Unidad',
          'slug_rol' => 'jefe',
          'descripcion_rol' => 'Es el encargado de aprobar órdenes de compra en el sistema.',
        ]);
        $table->insert([
          'nombre_rol' => 'Jefe de UACI',
          'slug_rol' => 'uaci',
          'descripcion_rol' => 'Se encarga de todos los tramites de la UACI',
        ]);
        $table->insert([
          'nombre_rol' => 'Técnico',
          'slug_rol' => 'tecnico',
          'descripcion_rol' => 'Este rol se encarga de gestionar los equipos en un determinado departamento.',
        ]);
        $table->insert([
          'nombre_rol' => 'Proveedor',
          'slug_rol' => 'proveedor',
          'descripcion_rol' => 'Entidad a quien se le compran los equipos de alto consumo eléctrico.'
        ]);
    }
}
