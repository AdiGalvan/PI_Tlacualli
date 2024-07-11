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
            $table->boolean('estatus') -> default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
