<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Carrera;

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
        
            $data = $request->only(['nombre', 'apellido', 'fecha_nacimiento', 'sexo', 'privado', 'biografia', 'carrera_id']);
        
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $data['avatar'] = $avatarPath;
            }
        
            $user->update($data);
       
            return redirect()->route('home')->with('success', 'Perfil actualizado con éxito.');
    }
}
