<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        // Insertar un usuario de ejemplo
        DB::table('usuarios')->insert([
            'nombre_usuario' => 'usuario123',
            'correo' => 'usuario123@example.com',
            'contraseña' => Hash::make('password123'), // Recuerda usar Hash para la contraseña
            'fecha_nacimiento' => '1990-01-01',
            'nombre' => 'Juan',
            'apellido_paterno' => 'Pérez',
            'apellido_materno' => 'Gómez',
            'id_direccion_envios' => null,
            'RFC' => 'ABC123456XYZ',
            'id_direccion_fiscal' => null,
            'telefono' => '1234567890',
            'id_sexo' => null,
            'descripcion' => 'Descripción del usuario',
            'slogan' => 'Slogan del usuario',
            'avatar' => '/path/al/avatar.jpg',
            'id_rol' => 1, // Reemplaza con el ID del rol del usuario
            'estatus' => true, // Usuario activo
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
