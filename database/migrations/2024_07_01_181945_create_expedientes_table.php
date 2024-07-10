<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_expediente')->unique();
            $table->string('nombres_deudor');
            $table->string('apellidos_deudor');
            $table->string('dni_ruc');
            $table->string('domicilio_deudor');
            $table->string('direccion_predio');
            $table->string('procedencia');
            $table->date('fecha_notificacion')->nullable();
            $table->string('infraccion');
            $table->string('estado')->default('REC');
            $table->decimal('monto_adeudado', 10, 2);
            $table->string('medida_complementaria')->nullable();
            $table->string('archivo_rec')->nullable();
            $table->string('archivo_reef')->nullable();
            $table->string('archivo_rc')->nullable();
            $table->string('archivo_rsec')->nullable();
            $table->string('archivo_hoja_coordinacion')->nullable();
            $table->string('archivo_informe')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
}
