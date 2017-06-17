<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(InstitucionSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuItemSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TipoSolicitudSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(TipoMantenimientoSeeder::class);
    }
}
