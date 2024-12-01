<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'almacenamiento',
        'descripcion',
        'duracion',
        'cantidad_usuarios',
        'modulo1',
        'modulo2',
        'modulo3',
        'limite_usuarios_clientes',
        'limite_clientes',
        'limite_almacenamiento',
    ];

    protected $casts = [
        'modulo1' => 'boolean',
        'modulo2' => 'boolean',
        'modulo3' => 'boolean',
    ];
}