<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 15);
            $table->timestamps();
        });

        DB::table('roles')->insert([
<<<<<<< HEAD
            ['nombre' => 'Persona física'],
            ['nombre' => 'Persona moral']
=======
            ['nombre' => 'Usuario'],
            ['nombre' => 'Restaurante'],
            ['nombre' => 'Compostador'],
            ['nombre' => 'Proveedor'],
            ['nombre' => 'Especialista'],
            ['nombre' => 'Tallerista'],
            ['nombre' => 'Administrador']
>>>>>>> e981c800a8e316e59f19cbb576e8dda00a3aa1e3
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
