<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmistadController extends Controller
{
    public function mostrarAmigos()
{
    // Obtener los amigos del usuario autenticado
    $usuario = auth()->user();
    $amigos = $usuario->amigos;

    return view('amigos', ['amigos' => $amigos]);
}
public function eliminarAmigo($id)
{
    $amistad = Amistad::findOrFail($id);
    
    // Verificar si el usuario autenticado es uno de los usuarios involucrados en la amistad
    if ($amistad->ID_usuario != auth()->user()->id && $amistad->ID_amigo != auth()->user()->id) {
        abort(403, 'No tienes permiso para eliminar esta amistad.');
    }
    
    $amistad->delete();

    return redirect()->back()->with('success', 'Amistad eliminada con éxito.');
}
public function mostrarSolicitudesPendientes()
{
    // Obtener las solicitudes de amistad pendientes dirigidas al usuario autenticado
    $solicitudes = SolicitudAmistad::where('ID_amigo', auth()->user()->id)
                                    ->where('estado', 'pendiente')
                                    ->get();

    return view('solicitudes_pendientes', ['solicitudes' => $solicitudes]);
}

}
