<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = 'Administrador';
        $usuario->email = 'admin@example.com';
        $usuario->password = bcrypt('admin123');
        $usuario->rol = 2;
        $usuario->departamento = 'GESA';
        $usuario->save();
    }
}
