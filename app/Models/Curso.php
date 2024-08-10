<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'cursos';

    // Indicar los campos que pueden ser llenados en masa
    protected $fillable = [
        'nombre',
        'descripcion',
        'cupos',
        'sede',
        'imagen',
    ];
}
