<?php

use Illuminate\Database\Seeder;
use App\Modelos\Menu;
use App\Modelos\Rol;
class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tabla Permiso
      $table = DB::table('permiso');
      //Definiendo Menus para el Administrador
      $rol = Rol::where('slug_rol', 'administrador')->first();
      //Recuperando los menus.
      $menu = Menu::where('slug_menu', 'usuario')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'institucion')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'licitacion')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'solicitud')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'equipo')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'orden')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      //Definiendo menus para el UACI
      $rol = Rol::where('slug_rol', 'uaci')->first();
      $menu = Menu::where('slug_menu', 'licitacion')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'orden')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'solicitud')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      //Definiendo menus para el tecnico.
      $rol = Rol::where('slug_rol', 'tecnico')->first();
      $menu = Menu::where('slug_menu', 'solicitud')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'orden')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'equipo')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);
      $menu = Menu::where('slug_menu', 'compras')->first();
      $table->insert([
        'id_rol' => $rol->id,
        'id_menu' => $menu->id,
      ]);

    }
}
