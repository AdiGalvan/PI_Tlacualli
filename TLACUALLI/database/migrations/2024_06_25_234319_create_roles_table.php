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
            ['nombre' => 'Usuario'],
            ['nombre' => 'Restaurante'],
            ['nombre' => 'Compostador'],
            ['nombre' => 'Proveedor'],
            ['nombre' => 'Especialista'],
            ['nombre' => 'Tallerista'],
            ['nombre' => 'Administrador']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
