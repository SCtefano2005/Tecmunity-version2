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
        'url_media',
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

    public function isVideo()
    {
        // Lógica para determinar si el comentario contiene un video
        // Por ejemplo, podrías verificar si la URL de la media contiene una extensión de video
        $mediaUrl = $this->url_media;
        $extension = pathinfo($mediaUrl, PATHINFO_EXTENSION);
        $videoExtensions = ['mp4', 'avi', 'mov']; // Extensiones de video permitidas
        return in_array($extension, $videoExtensions);
    }
}
