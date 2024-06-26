<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSexosTable extends Migration
{
    public function up()
    {
        Schema::create('sexos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 15);
            $table->timestamps();
        });

        DB::table('sexos')->insert([
            ['nombre' => 'Hombre'],
            ['nombre' => 'Mujer'],
            ['nombre' => 'No aplica'],
            ['nombre' => 'Otro'],
            ['nombre' => 'Sin mención']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sexos');
    }
}
