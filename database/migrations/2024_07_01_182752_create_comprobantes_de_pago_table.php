<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesDePagoTable extends Migration
{
    public function up()
    {
        Schema::create('comprobantes_de_pago', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediente_id')->constrained('expedientes');
            $table->string('nombre_razon_social_pagador');
            $table->string('numero_recibo_caja')->unique();
            $table->date('fecha_pago');
            $table->decimal('monto_total', 10, 2);
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comprobantes_de_pago');
    }
}
