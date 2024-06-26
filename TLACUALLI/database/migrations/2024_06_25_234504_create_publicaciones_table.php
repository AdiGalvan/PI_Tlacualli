<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('nombre', 50);
            $table->string('contenido', 255);
            $table->date('fecha_publicacion');
            $table->float('costo')->nullable();
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->foreignId('id_tipo')->constrained('tipos_publicaciones');
            $table->foreignId('id_usuario_revision')->nullable()->constrained('usuarios');
            $table->date('fecha_revision')->nullable();
            $table->text('notas')->nullable();
            $table->boolean('estatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
