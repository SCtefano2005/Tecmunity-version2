@extends('main')

@section('title', 'settings')

@section('contenido')

@yield('contenidoSettings')

<div class="suggestions_row">
    <div class="row shadow">
        <div class="row_title">
            <span>Profile Settings</span>
        </div>
        <div class="menusetting_contain">
            <ul>
                <li>
                    <a href="{{ route('infoPersonal') }}">Personal Information</a>
                </li>
                <li>
                    <a href="{{ route('account') }}" id="settings-select">Account Settings</a>
                </li>
                <li>
                    <a href="Change-Password.html">Change Password</a>
                </li>
                <li>
                    <a href="#">Hobbies and Interests</a>
                </li>
                <li>
                    <a href="#">Education and Employement</a>
                </li>
            </ul>
        </div>
    </div>
@endsection