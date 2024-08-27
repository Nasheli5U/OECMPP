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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('ID_archivo');
            $table->foreignId('ID_expediente')->constrained('expedientes', 'ID_expediente');
            $table->string('archivos_REC')->nullable();
            $table->string('archivos_REEF')->nullable();
            $table->string('archivos_RC')->nullable();
            $table->string('archivos_RSEC')->nullable();
            $table->string('archivos_otros')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
