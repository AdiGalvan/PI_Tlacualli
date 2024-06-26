<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallesTable extends Migration
{
    public function up()
    {
        Schema::create('calles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->foreignId('id_colonia')->constrained('colonias');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calles');
    }
}
