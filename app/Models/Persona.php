<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'ID_persona';

    protected $fillable = [
        'nombre', 'apellido', 'DNI', 'RUC', 'domicilio_fiscal'
    ];
}
