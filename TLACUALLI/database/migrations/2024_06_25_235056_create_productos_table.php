<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< Updated upstream
=======
    /**
     * Run the migrations.
     */
>>>>>>> Stashed changes
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('costo', 8, 2);
            $table->integer('stock');
<<<<<<< Updated upstream
            $table->tinyInteger('estatus')->default(1);
            $table->integer('proveedor_id');
=======
            $table->tinyInteger('estatus');
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedores')->onDelete('cascade');
>>>>>>> Stashed changes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

