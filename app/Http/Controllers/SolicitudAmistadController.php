<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudAmistad;

class SolicitudAmistadController extends Controller
{
    public function enviarSolicitud(Request $request)
    {
        $solicitud = new Amistad();
        $solicitud->ID_usuario = auth()->user()->id; // ID del usuario que envía la solicitud
        $solicitud->ID_amigo = $request->input('id_amigo'); // ID del usuario al que se envía la solicitud
        $solicitud->save();
    
        return redirect()->back()->with('success', 'Solicitud de amistad enviada con éxito.');
    }
    

    public function mostrarSolicitudesPendientes()
    {
        $solicitudes = Amistad::where('ID_amigo', auth()->user()->id)
                                        ->where('estado', 'pendiente')
                                        ->get();
    
        return view('solicitudes_pendientes', ['solicitudes' => $solicitudes]);
    }
    

    public function aceptarSolicitud($id)
    {
        $solicitud = Amistad::findOrFail($id);
        $solicitud->estado = 'aceptada';
        $solicitud->save();
    
        // Crear una nueva entrada en la tabla de amistades
        $amistad = new Amistad();
        $amistad->ID_usuario = $solicitud->ID_amigo;
        $amistad->ID_amigo = $solicitud->ID_usuario;
        $amistad->fecha = now();
        $amistad->estado = 'aceptada';
        $amistad->save();
    
        return redirect()->back()->with('success', 'Solicitud de amistad aceptada.');
    }
    

    public function rechazarSolicitud($id)
{
    $solicitud = Amistad::findOrFail($id);
    $solicitud->estado = 'rechazada';
    $solicitud->save();

    return redirect()->back()->with('success', 'Solicitud de amistad rechazada.');
}


public function eliminarSolicitud($id)
{
    $solicitud = Amistad::findOrFail($id);
    $solicitud->delete();

    return redirect()->back()->with('success', 'Solicitud de amistad eliminada.');
}

}
