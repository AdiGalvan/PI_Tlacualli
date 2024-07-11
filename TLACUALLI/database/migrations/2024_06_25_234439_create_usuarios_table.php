<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario', 50);
            $table->string('correo', 50);
            $table->binary('contraseña');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('apellido_paterno', 50)->nullable();
            $table->string('apellido_materno', 50)->nullable();
            $table->foreignId('id_direccion_envios')->nullable()->constrained('direcciones');
            $table->string('RFC', 13)->nullable();
            $table->foreignId('id_direccion_fiscal')->nullable()->constrained('direcciones');
            $table->string('telefono', 12)->nullable();
            $table->foreignId('id_sexo')->nullable()->constrained('sexos');
            $table->text('descripcion')->nullable();
            $table->string('slogan', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->foreignId('id_rol')->nullable()->constrained('roles');
            $table->boolean('estatus')->default(1);
            $table->timestamps();
        });

        DB::table('usuarios')->insert([
            [
                'nombre_usuario' => 'Colectivo nanakatl',
                'correo' => 'nanakatl@email.com',
                'contraseña' => bcrypt('123'),
                'fecha_nacimiento' => '1990-01-01',
                'nombre' => 'Colectivo nanakatl',
                'id_sexo' => 3,
                'id_rol' => 3,
            ],
            [
                'nombre_usuario' => 'Hagamos Composta',
                'correo' => 'hagamoscomposta@email.com',
                'contraseña' => bcrypt('123'),
                'fecha_nacimiento' => '1992-02-02',
                'nombre' => 'Hagamos Composta',
                'id_sexo' => 3,
                'id_rol' => 3,
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
