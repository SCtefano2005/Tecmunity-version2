@extends('main')

@section('contenido')


<div class="modal-content">
    <ul>
        @foreach ($usuarios as $usuario)
            <li>
                <a href="{{ route('perfil.show', ['id' => $usuario->id]) }}">
                    <img src="{{ $usuario->avatar ? asset($usuario->avatar) : asset('images/default-avatar.jpg') }}" alt="">
                    <span><b>{{ $usuario->nombre }}</b><br>{{ $usuario->amigos_en_comun }} Friends in Common</span>
                    <button class="modal-content-accept">Accept</button>
                    <button class="modal-content-decline">Decline</button>
                </a>
            </li>
        @endforeach
    </ul>
</div>


<style>
    <style>
    .modal-content {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .modal-content li {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding: 15px;
    }

    .modal-content li:last-child {
        border-bottom: none;
    }

    .modal-content img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .modal-content span {
        font-size: 14px;
    }

    .modal-content button {
        margin-left: auto;
        border: none;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .modal-content button.modal-content-accept {
        margin-right: 5px;
        background-color: #28a745;
    }

    .modal-content button.modal-content-decline {
        background-color: #dc3545;
    }

    .modal-content button:hover {
        background-color: #0056b3;
    }
</style>

</style>
@endsection
