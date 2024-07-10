<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptoPago extends Model
{
    use HasFactory;

    protected $fillable = [
        'comprobante_id', 'concepto', 'costo'
    ];

    public function comprobante()
    {
        return $this->belongsTo(ComprobanteDePago::class);
    }
}
