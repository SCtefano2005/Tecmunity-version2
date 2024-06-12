<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', // Lista de campos que pueden ser asignados masivamente
    ];

    // Relación uno a muchos con la tabla Carreras
    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'departamento_id', 'id');
    }
}

