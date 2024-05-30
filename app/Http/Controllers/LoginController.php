<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/publicaciones');
        }
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials)) {
            return redirect('/')->withErrors(['error' => 'Credenciales incorrectas.']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if (!$user->email_verified_at) {
            Auth::logout();
            return redirect('/')->with('login_error', 'Debes verificar tu correo electrónico antes de iniciar sesión.');
        }

        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/publicaciones');
    }
}