<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relacion_usuario_taller', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('usuarios');
            $table->foreignId('id_publicacion')->constrained('publicaciones');
            $table->boolean('estatus')->default(1);
            $table->boolean('conclusion')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relacion_usuario_taller');
    }
};
