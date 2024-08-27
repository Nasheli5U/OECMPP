<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';
    protected $primaryKey = 'ID_archivo';

    protected $fillable = [
        'ID_expediente', 'archivos_REC', 'archivos_REEF', 'archivos_RC', 'archivos_RSEC', 'archivos_otros'
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'ID_expediente');
    }
}
