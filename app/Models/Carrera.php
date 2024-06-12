<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', // Lista de campos que pueden ser asignados masivamente
    ];

    // Relación muchos a uno con la tabla Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    // Relación uno a muchos con la tabla Usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'carrera_id', 'id');
    }
}
