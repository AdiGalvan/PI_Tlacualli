<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario1')->constrained('usuarios');
            $table->foreignId('id_usuario2')->constrained('usuarios');
            $table->text('contenido')->nullable();
            $table->boolean('estatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
