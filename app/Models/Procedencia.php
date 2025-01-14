<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    use HasFactory;
    protected $table = 'procedencias';
    protected $primaryKey = 'ID_procedencia';

    protected $fillable = [
        'nombre'
    ];
}
