<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class EvaluacionDocente extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'archivo',
        'user_id',
        'estado'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
