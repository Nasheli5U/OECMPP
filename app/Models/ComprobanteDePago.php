<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteDePago extends Model
{
    use HasFactory;

    protected $fillable = [
        'expediente_id', 'nombre_razon_social_pagador', 'numero_recibo_caja', 
        'fecha_pago', 'monto_total', 'descripcion'
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}
S