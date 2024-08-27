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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id('ID_expediente');
            $table->string('numero')->unique();
            $table->foreignId('ID_persona')->constrained('personas', 'ID_persona');
            $table->string('direccion_predio');
            $table->foreignId('ID_procedencia')->constrained('procedencias', 'ID_procedencia');
            $table->date('fecha_entrada');
            $table->date('fecha_notificacion')->nullable();
            $table->foreignId('ID_infraccion')->constrained('infracciones', 'ID_infraccion');
            $table->string('estado');
            $table->text('medida_complementaria')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
