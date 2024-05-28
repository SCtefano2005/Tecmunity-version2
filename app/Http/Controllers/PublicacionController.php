<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::with('usuario')->orderBy('created_at', 'desc')->get();
        return view('Tecmunity.publicaciones', compact('publicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,mp3',
            'video_url' => 'nullable|url'
        ]);

        $data = $request->only(['contenido', 'video_url']);
        $data['ID_usuario'] = Auth::id();
        $data['nro_likes'] = 0;

        if ($request->hasFile('media')) {
            $data['url_media'] = $request->file('media')->store('media', 'public');
        }

        Publicacion::create($data);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada correctamente.');
    }
}
