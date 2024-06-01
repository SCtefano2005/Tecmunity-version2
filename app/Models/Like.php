<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'ID_usuario', 'ID_publicacion', 'fecha', 'ID_comentario',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_usuario','id');
    }

    // Relación con el modelo Publicacion
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'ID_publicacion');
    }

    // Relación con el modelo Comentario
    public function comentario()
    {
        return $this->belongsTo(Comentario::class, 'ID_comentario');
    }
}
