<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        $usernameOrEmail = $credentials['username'];

        // Si el input es un correo electrónico de Tecsup
        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            if (preg_match('/@tecsup\.edu\.pe$/', $usernameOrEmail)) {
                $credentials = [
                    'email' => $usernameOrEmail,
                    'password' => $credentials['password']
                ];
            } else {
                return redirect('/')
                    ->withErrors(['username' => 'Por favor, ingresa un correo electrónico válido de @tecsup.edu.pe']);
            }
        }

        // Intentar autenticación con las credenciales ajustadas
        if (!Auth::attempt($credentials)) {
            return redirect('/');
                
        }

        $user = Auth::user();

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/home');
    }
}

