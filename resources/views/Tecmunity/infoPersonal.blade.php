@extends('settings')

@section('title', 'Informacion Personal')

@section('contenidoSettings')
<div class="right_row">
    <div class="row border-radius">
        <center>
            <div class="settings shadow">
                <div class="settings_title">
                    <h3>Personal Information</h3>
                </div>
                <div class="settings_content">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="pi-input pi-input-lg">
                            <span>Nombre</span>
                            <input type="text" name="nombre" value="{{ old('nombre', auth()->user()->nombre) }}" required />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Apellido</span>
                            <input type="text" name="apellido" value="{{ old('apellido', auth()->user()->apellido) }}" required />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Username</span>
                            <input type="text" name="username" value="{{ old('username', auth()->user()->username) }}" required />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Your Email</span>
                            <input type="text" value="{{ auth()->user()->email }}" readonly />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Carrera</span>
                            <select name="carrera_id">
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id }}" {{ old('carrera_id', auth()->user()->carrera_id) == $carrera->id ? 'selected' : '' }}>
                                        {{ $carrera->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Fecha de nacimiento</span>
                            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', auth()->user()->fecha_nacimiento) }}" />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Avatar</span>
                            <input type="file" name="avatar" />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Portada</span>
                            <input type="file" name="portada" />
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Genero</span>
                            <select name="sexo">
                                <option value="Hombre" {{ old('sexo', auth()->user()->sexo) == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                                <option value="Mujer" {{ old('sexo', auth()->user()->sexo) == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                                <option value="Otro" {{ old('sexo', auth()->user()->sexo) == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                        <div class="pi-input pi-input-lg">
                            <span>Perfil</span>
                            <select name="privado" required>
                                <option value="0" {{ old('privado', auth()->user()->privado) == 0 ? 'selected' : '' }}>Publico</option>
                                <option value="1" {{ old('privado', auth()->user()->privado) == 1 ? 'selected' : '' }}>Privado</option>
                            </select>
                        </div>
                        <div class="pi-input pi-input-lgg">
                            <span>Biografía</span>
                            <input type="text" name="biografia" value="{{ old('biografia', auth()->user()->biografia) }}" placeholder="Una pequeña info sobre ti..." />
                        </div>
                        <button type="submit">Guardar los cambios</button>
                    </form>
                </div>
            </div>
        </center>
    </div>
</div>
@endsection
