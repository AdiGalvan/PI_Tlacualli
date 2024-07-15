<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->foreignId('id_pais')->constrained('paises');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
