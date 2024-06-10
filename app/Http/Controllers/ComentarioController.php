<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;


class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string|max:255',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi|max:20480',
        ]);

        $mediaUrl = null;
        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $uploadedFile = Cloudinary::upload($media->getRealPath(), ['folder' => 'comentarios']);
            $mediaUrl = $uploadedFile->getSecurePath();
        }

        Comentario::create([
            'contenido' => $request->contenido,
            'ID_usuario' => Auth::id(),
            'ID_publicacion' => $request->publicacion_id,
            'url_media' => $mediaUrl,
        ]);

        return redirect()->back();
    }
    
    public function show($id)
    {
        // Aquí puedes cargar la publicación desde la base de datos usando el ID proporcionado
        $publicacion = Publicacion::findOrFail($id);
        $comentarios = $publicacion->comentarios()->latest()->get(); // Obtener los comentarios asociados a la publicación
        return view('Tecmunity.comentarios', compact('publicacion', 'comentarios'));
    }
}
