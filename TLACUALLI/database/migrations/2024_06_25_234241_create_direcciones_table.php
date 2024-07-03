<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('num_ext', 10);
            $table->string('num_int', 10)->nullable();
            $table->foreignId('id_calle')->constrained('calles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
