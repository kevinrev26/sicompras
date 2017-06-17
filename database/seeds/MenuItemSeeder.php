<?php

use Illuminate\Database\Seeder;
use App\Modelos\Menu;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('slug_menu', 'usuario')->first();

        $table = DB::table('menu_item');
        $table->insert([
          'nombre_item' => 'Listar usuarios',
          'ruta' => '/users',
          'menu' => $menu->id,
        ]);
        $menu = Menu::where('slug_menu', 'institucion')->first();
        $table->insert([
          'nombre_item' => 'Listar instituciones',
          'ruta' => '/institutions',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Agregar instituciones',
          'ruta' => '/addinstitutions',
          'menu' => $menu->id,
        ]);
        $menu = Menu::where('slug_menu', 'licitacion')->first();
        $table->insert([
          'nombre_item' => 'Agregar licitacion',
          'ruta' => '/addbiddings',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Buscar licitacion',
          'ruta' => '/biddings',
          'menu' => $menu->id,
        ]);
        $menu = Menu::where('slug_menu', 'solicitud')->first();
        $table->insert([
          'nombre_item' => 'Agregar solicitud de Compra',
          'ruta' => '/addsolicitud',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Agregar solicitud de Mantenimiento',
          'ruta' => '/addsolicitudMantenimiento',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Buscar solicitud',
          'ruta' => '/solicitude',
          'menu' => $menu->id,
        ]);
        $menu = Menu::where('slug_menu', 'orden')->first();
        $table->insert([
          'nombre_item' => 'Agregar orden de compra',
          'ruta' => '/pruchaseorders/create',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Buscar orden de compra',
          'ruta' => '/purchaseorders',
          'menu' => $menu->id,
        ]);
        $menu = Menu::where('slug_menu', 'equipo')->first();
        $table->insert([
          'nombre_item' => 'Agregar al Catalogo de Equipos',
          'ruta' => '/addequipments',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Buscar en el Catalogo de Equipos',
          'ruta' => '/equipments',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Agregar al Inventaro de Equipos',
          'ruta' => '/create-stockequipments',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Ver Inventario de Equipos',
          'ruta' => '/stockequipments',
          'menu' => $menu->id,
        ]);
        $menu = Menu::where('slug_menu', 'compras')->first();
        $table->insert([
          'nombre_item' => 'Buscar compras realizadas',
          'ruta' => '/purchases',
          'menu' => $menu->id,
        ]);
        $table->insert([
          'nombre_item' => 'Agregar una nueva compra',
          'ruta' => '/createpurchase',
          'menu' => $menu->id,
        ]);


    }
}
