<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function Register(RegisterRequest $request)
    {
        $user = Usuario::create($request->validated());
        return redirect('/')->with('success', 'ok');
    }
}
