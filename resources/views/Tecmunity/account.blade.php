@extends('settings')

@section('title', 'Account')

@section('contenidoSettings')
<div class="right_row">
    <div class="row border-radius">
        <div class="settings shadow">
            <div class="settings_title">
                <h3>Configuración de la cuenta</h3>
            </div>
            <div class="settings_content">
                <ul>
                    <li>
                        <p><b>Sonido de notificaciones</b><br>Se reproducirá un sonido cada vez que recibas una nueva notificación de actividad</p>
                        <label class="switch">
                            <input type="checkbox" class="primary">
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li>
                        <p><b>Correo electrónico de notificaciones</b><br>Te enviaremos un correo electrónico a tu cuenta cada vez que recibas una nueva notificación de actividad</p>
                        <label class="switch">
                            <input type="checkbox" class="primary" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li>
                        <p><b>Cumpleaños de amigos</b><br>Elige si recibir o no notificaciones sobre los cumpleaños de tus amigos en tu feed de noticias</p>
                        <label class="switch">
                            <input type="checkbox" class="primary" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li>
                        <p><b>Sonido de mensajes de chat</b><br>Se reproducirá un sonido cada vez que recibas un nuevo mensaje en una ventana de chat inactiva</p>
                        <label class="switch">
                            <input type="checkbox" class="primary">
                            <span class="slider round"></span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .right_row {
        padding: 20px;
    }

    .settings {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .settings_title {
        border-bottom: 1px solid #ddd;
        margin-bottom: 15px;
        padding-bottom: 15px;
    }

    .settings_title h3 {
        color: #333;
        font-size: 24px;
        margin: 0;
    }

    .settings_content ul {
        list-style: none;
        padding: 0;
    }

    .settings_content ul li {
        border-bottom: 1px solid #ddd;
        margin-bottom: 15px;
        padding-bottom: 15px;
    }

    .settings_content ul li p {
        color: #666;
        margin: 0;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

@endsection