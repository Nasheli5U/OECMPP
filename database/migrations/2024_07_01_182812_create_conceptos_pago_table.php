<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptosPagoTable extends Migration
{
    public function up()
    {
        Schema::create('conceptos_pago', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comprobante_id')->constrained('comprobantes_de_pago');
            $table->string('concepto');
            $table->decimal('costo', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conceptos_pago');
    }
}
