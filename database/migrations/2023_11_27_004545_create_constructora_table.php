<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('constructora', function (Blueprint $table) {
            $table->id();
            $table->string('Dueño_de_la_obra');
            $table->string('Direccion_de_la_obra');
            $table->date('Fecha_inicio_de_Obra');
            $table->date('Fecha_fin_de_Obra');
            $table->decimal('Costo', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constructora');
    }
};
