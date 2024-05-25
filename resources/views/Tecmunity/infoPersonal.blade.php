@extends('settings')

@section('title', 'Informacion Personal')

@section('contenidoSettings')
<div class="right_row">

    <div class="row border-radius">
        <center><div class="settings shadow">
            <div class="settings_title">
                <h3>Personal Information</h3>
            </div>
            <div class="settings_content">
                <form>
                    <div class="pi-input pi-input-lg">
                        <span>Nombre</span>
                        <input type="text" value="" />
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Apellido</span>
                        <input type="text" value="" />
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Your Email</span>
                        <input type="text" value="{{ auth()->user()->email}}" />
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Carrera</span>
                        <select>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Fecha de nacimiento</span>
                        <input type="date" value="1985-01-08" />
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Avatar</span>
                        <input type="file" />
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Genero</span>
                        <select>
                            <option selected>Hombre</option>
                            <option>Mujer</option>
                            <option>Otro</option>
                        </select>
                    </div>
                    <div class="pi-input pi-input-lg">
                        <span>Perfil</span>
                        <select>
                            <option selected>Publico</option>
                            <option>Privado</option>
                        </select>
                    </div>
                    <div class="pi-input pi-input-lgg">
                        <span>Biografía</span>
                        <input type="text" value="" placeholder="Una pequeña info sobre ti..." />
                    </div>

                    <button>Guardar los cambios</button>
                </form>
            </div>
        </div></center>
    </div>
</div>
@endsection