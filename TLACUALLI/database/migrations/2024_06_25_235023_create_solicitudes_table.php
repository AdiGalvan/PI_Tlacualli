<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('usuarios');
            $table->foreignId('id_proveedor')->constrained('usuarios');
            $table->text('descripcion');
            $table->foreignId('id_publicacion')->constrained('publicaciones');
            $table->foreignId('id_tipo')->constrained('tipos_solicitudes');
            $table->date('fecha');
            $table->boolean('estatus') -> default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
