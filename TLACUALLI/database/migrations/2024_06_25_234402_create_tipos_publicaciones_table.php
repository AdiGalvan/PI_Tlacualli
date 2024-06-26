<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPublicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 15);
            $table->timestamps();
        });

        DB::table('tipos_publicaciones')->insert([
            ['nombre' => 'Académico'],
            ['nombre' => 'Taller'],
            ['nombre' => 'Servicio'],
            ['nombre' => 'Anuncios']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tipos_publicaciones');
    }
}
