<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
{
public function buscar(Request $request)
{
    $termino = $request->input('termino');

    $usuarios = Usuario::where(function ($query) use ($termino) {
        $query->where(Usuario::raw('LOWER(nombre)'), 'like', '%' . strtolower($termino) . '%')
            ->orWhere(Usuario::raw('LOWER(apellido)'), 'like', '%' . strtolower($termino) . '%')
            ->orWhere(Usuario::raw('LOWER(CONCAT(nombre, " ", apellido))'), 'like', '%' . strtolower($termino) . '%');
    })->get();
    
    return view('Tecmunity.busqueda', compact('usuarios'));
}

}
