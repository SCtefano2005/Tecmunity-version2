<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Carrera;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $carreras = Carrera::all();
        return view('Tecmunity.infoPersonal', compact('carreras'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->only([
            'nombre', 'apellido', 'fecha_nacimiento', 'sexo', 
            'privado', 'biografia', 'carrera_id', 'username'
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = Cloudinary::upload($request->file('avatar')->getRealPath(), [
                'folder' => 'avatars'
            ])->getSecurePath();
            $data['avatar'] = $avatarPath;
        }

        if ($request->hasFile('portada')) {
            $portadaPath = Cloudinary::upload($request->file('portada')->getRealPath(), [
                'folder' => 'portadas'
            ])->getSecurePath();
            $data['portada'] = $portadaPath;
        }

        $user->update($data);

        return redirect()->route('perfil.show', ['id' => Auth::id()])->with('success', 'Perfil actualizado con éxito.');

    }
    public function updateBiografia(Request $request)
{
    $user = Auth::user();
    $user->biografia = $request->input('biografia');
    $user->save();

    return redirect()->back()->with('success', 'Biografía actualizada correctamente.');
}

}
