<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el número de usuarios
        $numeroUsuarios = DB::table('usuarios')->count();

        // Obtener los nombres de las columnas de la tabla publicaciones
        $numeroPublicaciones = DB::table('publicaciones')->count();

        // Obtiene el numero de los comentarios
        $numeroComentarios = DB::table('comentarios')->count();

        // Obtiene el numero de carreras registradas 
        $numeroCarreras = DB::table('carreras')->count();

        // Obtener el número de usuarios registrados por mes
        $usuariosPorMes = DB::table('usuarios')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Pasar los datos a la vista del dashboard
        return view('dashboard', [
            'title' => 'Dashboard',
            'numeroUsuarios' => $numeroUsuarios,
            'numeroPublicaciones' => $numeroPublicaciones,
            'numeroComentarios' => $numeroComentarios,
            'numeroCarreras' => $numeroCarreras,
            'usuariosPorMes' => $usuariosPorMes
        ]);
    }

    public function controlUsuarios()
    {
        return view('dashboard-user');
    }

    public function contarColumnasUsuarios()
    {
        // Obtener los nombres de las columnas de la tabla usuarios
        $columnas = DB::select('SHOW COLUMNS FROM usuarios');

        // Contar el número de columnas
        $conteoColumnas = count($columnas);

        // Pasar el conteo a la vista
        return view('dashboard.usuarios', ['title' => 'Usuarios', 'conteoColumnas' => $conteoColumnas]);
    }
}
