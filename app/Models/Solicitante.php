<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'Cedula',
        'fecha',
        'name',
        'apellido',
        'direccion',
        'cel',
        'departamento',
        'municipio',
        'foto',
        'email',
        'password',
    ];
}
