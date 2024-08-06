<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRPTable extends Migration
{
    public function up()
    {
        Schema::create('relacion_producto_orden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_orden')->constrained('ordenes_ventas');
            $table->foreignId('id_producto')->constrained('productos');
            $table->integer('cantidad')->nullable();
            $table->float('subtotal')->nullable();
            $table->boolean('estatus')->default(0);
            $table->boolean('conclusion')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relacion_producto_orden');
    }
}
