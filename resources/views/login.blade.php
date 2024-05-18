@extends('layouts.layout')

@section('title', 'Ingresar')

@section('content')
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="#" class="sign-in-form">
                <h2 class="title">Iniciar Sesion</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Usuario" name="username" required />
                </div>
                <div class="input-field password-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="pass" required />
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <input type="submit" value="Iniciar Sesion" class="btn solid" />
            </form>
            <form action="/" method="POST" class="sign-up-form">
                <h2 class="title">Registrarse</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Usuario" name="username" value="{{ old('username') }}"  required  />
                    @error('username')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required />
                    @error('email')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-field password-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="pass" required />
                    @error('pass')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <div class="input-field password-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirmar Contraseña" name="pass_confirmation" required />
                    @error('pass_confirmation')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <input type="submit" class="btn" value="Registrarse" />
            </form>
        </div>
    </div>  

    <div class="panels-container">
        <div class="panel left-panel"> 
        
            <div class="content">
              <h3>
                <img  style="width: 550px; height: 250px; border-radius: 15%" src="{{ asset('img/Tecmunity_Logo.png') }}" alt="Descripción de la imagen">
            </h3>
            
              
                <p>
                    Registrarte en TecMunity, una red social <b style="text-decoration: underline">exclusiva</b> para Tecsup.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Registrarse
                </button>
            </div>
            <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3> Eres uno de nosotros?</h3>
                <h3>
                  <img  style="width: 550px; height: 250px; border-radius: 15%" src="{{ asset('img/Tecmunity_Logo.png') }}" alt="Descripción de la imagen">
              </h3>

                <p>
                    Inicia sesion en TecMunity aca
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Iniciar Sesion
                </button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>
@endsection
  