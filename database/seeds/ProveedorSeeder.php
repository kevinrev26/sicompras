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
        $nuevo->total_acumulado = 0.00;
        $nuevo->representante = 'Edgar Sanchez';
        $nuevo->save();

        $new = new Proveedor();
        $new->name = 'Proveedor numero 2';
        $new->email = 'proveedor2@example.com';
        $new->password = bcrypt('123456');
        $new->nit = '06142807931309';
        $new->tipo_persona = true;
        $new->rol = 6;
        $new->total_acumulado = 25000.00;
        $new->representante = 'David Gilmour';
        $new->save();
    }
}
