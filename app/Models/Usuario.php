<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', 'apellido', 'email', 'username', 'pass', 'fecha_nacimiento',
        'fecha_registro', 'sexo', 'status', 'privado', 'admin', 'avatar', 'carrera_id', 'biografia'
    ];

    // Relación muchos a uno con la tabla Carreras
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id');
    }

    public function setPassAttribute($value){
        $this->attributes['pass'] =  bcrypt($value);
    }
}
