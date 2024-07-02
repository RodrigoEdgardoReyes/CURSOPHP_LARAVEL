<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('docente')->insert([
            // primer campo que voy a mandar
            'nombre' => 'admin',
            'apellido' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('estudiante')->insert([
            // Datos para iniciar sesion
            'nombre' => 'rodri',
            'apellido' => 'roust',
            'email' => 'rodri@roust.com',
            'pin' => 'JK34001'
        ]);

        DB::table('estudiante')->insert([
            // Datos para iniciar sesion
            'nombre' => 'reyes',
            'apellido' => 'reyes',
            'email' => 'reyes@reyes.com',
            'password' => 'LM33001'
        ]);

    }
}
