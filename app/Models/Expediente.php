<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_expediente', 'nombres_deudor', 'apellidos_deudor', 'dni_ruc', 'domicilio_deudor', 
        'direccion_predio', 'procedencia', 'fecha_notificacion', 'infraccion', 'estado', 
        'monto_adeudado', 'medida_complementaria', 'archivo_rec', 'archivo_reef', 
        'archivo_rc', 'archivo_rsec', 'archivo_hoja_coordinacion', 'archivo_informe'
    ];
}
