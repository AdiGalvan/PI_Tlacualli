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
            $table->string('nombre', 100);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['nombre' => 'Usuario'],
            ['nombre' => 'Restaurante'],
            ['nombre' => 'Procesador de RO'],
            ['nombre' => 'Proveedor'],
            ['nombre' => 'Especialista'],
            ['nombre' => 'Tallerista'],
            ['nombre' => 'Administrador'],
            ['nombre' => 'Productor'],
            ['nombre' => 'Procesador de RO y Productor']
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
