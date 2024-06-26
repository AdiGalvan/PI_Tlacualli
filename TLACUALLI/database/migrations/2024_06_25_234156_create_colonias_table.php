<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoniasTable extends Migration
{
    public function up()
    {
        Schema::create('colonias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->foreignId('id_municipio')->constrained('municipios');
            $table->integer('CP');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('colonias');
    }
}
