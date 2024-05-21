<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:10'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@tecsup\.edu\.pe$/', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

}

