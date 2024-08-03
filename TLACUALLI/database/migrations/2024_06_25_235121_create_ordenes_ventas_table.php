<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes_ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('usuarios');
            $table->float('total')->nullable();
            $table->date('fecha')->nullable();
            $table->boolean('estatus')->default(1);
            $table->boolean('conclusion')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes_ventas');
    }
}
