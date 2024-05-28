<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class PerfilController extends Controller
{
    public function show($id)
    {
        $perfil = Usuario::findOrFail($id);
        return view('Tecmunity.perfil', compact('perfil'));
    }
}