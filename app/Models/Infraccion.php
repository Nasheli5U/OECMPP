<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    use HasFactory;
    protected $table = 'infracciones';
    protected $primaryKey = 'ID_infraccion';

    protected $fillable = [
        'codigo', 'descripcion', 'monto'
    ];
}
