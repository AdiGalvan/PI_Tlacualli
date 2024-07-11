<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });
<<<<<<< HEAD

        DB::table('paises')->insert([
            [
                'nombre' => 'México',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
=======
>>>>>>> e981c800a8e316e59f19cbb576e8dda00a3aa1e3
    }

    public function down()
    {
        Schema::dropIfExists('paises');
    }
}
