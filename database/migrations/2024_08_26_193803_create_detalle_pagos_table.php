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
        Schema::create('detalle_pagos', function (Blueprint $table) {
            $table->id('ID_detalle_pago');
            $table->foreignId('ID_comprobante')->constrained('comprobantes', 'ID_comprobante');
            $table->foreignId('ID_pago')->constrained('pagos', 'ID_pago');
            $table->decimal('monto', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pagos');
    }
};
