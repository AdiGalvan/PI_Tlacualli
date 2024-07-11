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
            $table->foreignId('id_pais')->constrained('paises')->default(1);
            $table->timestamps();
        });

        DB::table('estados')->insert([
            ['nombre' => 'Aguascalientes', 'id_pais' => 1],
            ['nombre' => 'Baja California', 'id_pais' => 1],
            ['nombre' => 'Baja California Sur', 'id_pais' => 1],
            ['nombre' => 'Campeche', 'id_pais' => 1],
            ['nombre' => 'Chiapas', 'id_pais' => 1],
            ['nombre' => 'Chihuahua', 'id_pais' => 1],
            ['nombre' => 'Ciudad de México', 'id_pais' => 1],
            ['nombre' => 'Coahuila', 'id_pais' => 1],
            ['nombre' => 'Colima', 'id_pais' => 1],
            ['nombre' => 'Durango', 'id_pais' => 1],
            ['nombre' => 'Estado de México', 'id_pais' => 1],
            ['nombre' => 'Guanajuato', 'id_pais' => 1],
            ['nombre' => 'Guerrero', 'id_pais' => 1],
            ['nombre' => 'Hidalgo', 'id_pais' => 1],
            ['nombre' => 'Jalisco', 'id_pais' => 1],
            ['nombre' => 'Michoacán', 'id_pais' => 1],
            ['nombre' => 'Morelos', 'id_pais' => 1],
            ['nombre' => 'Nayarit', 'id_pais' => 1],
            ['nombre' => 'Nuevo León', 'id_pais' => 1],
            ['nombre' => 'Oaxaca', 'id_pais' => 1],
            ['nombre' => 'Puebla', 'id_pais' => 1],
            ['nombre' => 'Querétaro', 'id_pais' => 1],
            ['nombre' => 'Quintana Roo', 'id_pais' => 1],
            ['nombre' => 'San Luis Potosí', 'id_pais' => 1],
            ['nombre' => 'Sinaloa', 'id_pais' => 1],
            ['nombre' => 'Sonora', 'id_pais' => 1],
            ['nombre' => 'Tabasco', 'id_pais' => 1],
            ['nombre' => 'Tamaulipas', 'id_pais' => 1],
            ['nombre' => 'Tlaxcala', 'id_pais' => 1],
            ['nombre' => 'Veracruz', 'id_pais' => 1],
            ['nombre' => 'Yucatán', 'id_pais' => 1],
            ['nombre' => 'Zacatecas', 'id_pais' => 1],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
