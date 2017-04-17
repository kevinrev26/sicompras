<?php

use Illuminate\Database\Seeder;
use App\Modelos\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nuevo = new Proveedor();
        $nuevo->name = 'Proveedor numero 1';
        $nuevo->email = 'proveedor@example.com';
        $nuevo->password = bcrypt('123456');
        $nuevo->nit = '06142607931209';
        $nuevo->tipo_persona = false;
        $nuevo->rol = 6;
        $nuevo->representante = 'Edgar Sanchez';
        $nuevo->save();
    }
}