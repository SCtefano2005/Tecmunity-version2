<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('main')->compact('usuarios');
    }
    public function account(){
        return view('Tecmunity.account');
    }
}
