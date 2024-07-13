<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDocente extends Model
{
    use HasFactory;
    protected $filable = [
        'descripcion',
        'archivo',
        'user_id',
        'estado',
    ];
}
