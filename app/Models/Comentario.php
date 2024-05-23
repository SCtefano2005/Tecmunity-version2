<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'ID_comentario';

    protected $fillable = [
        'ID_publicacion',
        'ID_usuario',
        'nro_likes',
        'contenido',
        'fecha'
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'ID_publicacion');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_usuario', 'id');
    }

    // Relación uno a muchos con la tabla Likes
    public function likes()
    {
        return $this->hasMany(Like::class, 'ID_comentario', 'id');
    }
}
