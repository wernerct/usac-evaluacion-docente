<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'codigocatedratico',
        'tipousuario',
        'carrera',
        'sede',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function evaluaciondocente()
    {
        return $this->hasMany(EvaluacionDocente::class); //,'[campo foreigne]' //a la par de class, se pone una coma y el nombre del campo de la llave foranea, esto si no se llaman igual en las diferentes tablas
        //return $this->hasMany(EvaluacionDocente::class,'codempelado'); //,'[campo foreigne]' //a la par de class, se pone una coma y el nombre del campo de la llave foranea, esto si no se llaman igual en las diferentes tablas
    }
}
