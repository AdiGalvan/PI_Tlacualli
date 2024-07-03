<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 15);
            $table->timestamps();
        });

        DB::table('tipos_solicitudes')->insert([
            ['nombre' => 'Taller'],
            ['nombre' => 'Servicio']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tipos_solicitudes');
    }
}
