@extends('layouts.layout')

@section('title', 'Ingresar')

@section('content')
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="/login" method="POST" class="sign-in-form">
                <h2 class="title">Iniciar Sesion</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Usuario o Correo" name="username" required />
                    @error('username')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="input-field password-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="password" required />
                    @error('password')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                        <br>
                    @enderror
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <input type="submit" value="Iniciar Sesion" class="btn solid" />
            </form>
            <form action="/register" method="POST" class="sign-up-form">
                <h2 class="title">Registrarse</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Usuario" name="username" value="{{ old('username') }}" required />
                    @error('username')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required />
                    @error('email')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="input-field password-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="password" required />
                    @error('password')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                        <br>
                    @enderror
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <div class="input-field password-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required />
                    @error('password_confirmation')
                        <br>
                        <small style="color: red">{{ $message }}</small>
                        <br>
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
                    <img style="width: 550px; height: 250px; border-radius: 15%" src="{{ asset('img/Tecmunity_Logo.png') }}" alt="Descripción de la imagen">
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
                    <img style="width: 550px; height: 250px; border-radius: 15%" src="{{ asset('img/Tecmunity_Logo.png') }}" alt="Descripción de la imagen">
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

@if(session('success') == 'ok')
    <script>
        Swal.fire("Registro con exito!");
    </script>
@endif
@if(session('login_error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error de inicio de sesión',
            text: "{{ session('login_error') }}"
        });
    </script>
@endif

@if($errors->has('username') || $errors->has('password'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Error de inicio de sesión',
                text: 'Sus credenciales son incorrectas. Por favor, vuelva a intentarlo.'
            });
        });
    </script>
@endif


<script>

    
  document.addEventListener('DOMContentLoaded', function () {
  const signUpForm = document.querySelector('.sign-up-form');
  const signInForm = document.querySelector('.sign-in-form');
  const emailPattern = /^[a-zA-Z0-9._%+-]+@tecsup\.edu\.pe$/;

  signUpForm.addEventListener('submit', function (event) {
      const emailInput = signUpForm.querySelector('input[name="email"]');
      if (!emailPattern.test(emailInput.value)) {
          event.preventDefault();
          Swal.fire({
              icon: 'error',
              title: 'Correo inválido',
              text: 'Por favor, ingresa un correo electrónico válido de @tecsup.edu.pe'
          });
      }
  });

  signInForm.addEventListener('submit', function (event) {
      const usernameOrEmailInput = signInForm.querySelector('input[name="username"]');
      const value = usernameOrEmailInput.value;
      const isEmail = emailPattern.test(value);
      const isUsername = value.length > 0 && !isEmail;

      if (!isEmail && !isUsername) {
          event.preventDefault();
          Swal.fire({
              icon: 'error',
              title: 'Error en el ingreso de usuario o correo',
              text: 'Por favor, ingresa un nombre de usuario o un correo electrónico válido de @tecsup.edu.pe'
          });
      }
  });

  // Validación de username en el formulario de registro
  signUpForm.addEventListener('submit', function(event) {
      const usernameInput = signUpForm.querySelector('input[name="username"]');
      const username = usernameInput.value;
      const usernamePattern = /^[a-zA-Z0-9_]{1,10}$/; // Patrón para permitir solo letras, números y guiones bajos (_), con longitud de 1 a 10 caracteres
      if (!usernamePattern.test(username)) {
          event.preventDefault();
          Swal.fire({
              icon: 'error',
              title: 'Usuario inválido',
              text: 'Por favor, ingresa un nombre de usuario válido (máximo 10 caracteres, solo letras, números y guiones bajos)'
          });
      }
  });
});

</script>
@endsection