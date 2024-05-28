@extends('main')

@section('title', 'Tecmunity')

@section('contenido')
<div class="right_row">
    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <span><a href="profile.html" id="select_profile_menu"><b>Profile</b></a> | <a href="about.html"><b>About</b></a> | <a href="photos.html"><b>Photos</b></a></span>
            </div>
        </div>
    </div>
@if($perfil->id == auth()->user()->id)
    <div class="row">
        <div class="publish">
            <div class="row_title">
                <span><i class="fa fa-newspaper-o" aria-hidden="true"></i> Status</span>
            </div>
            <form method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="publish_textarea">
                    <img class="border-radius-image" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('img/default-avatar.png') }}" alt="" />
                    <textarea name="contenido" placeholder="¿Algo que decir, {{ auth()->user()->nombre }}?" style="resize: none;"></textarea>
                </div>
                <div class="publish_icons">
                    <ul>
                        <li>
                            <input type="file" name="media" accept="image/*,video/*" style="display: none;" id="input-media" onchange="previewMedia(event)">
                            <label for="input-media">
                                <i class="fa fa-camera"></i>
                            </label>
                        </li>
                        <li>
                            <input type="url" name="video_url" placeholder="Video URL" style="display: none;" id="input-video-url" onchange="showVideoPreview(event)">
                            <label for="input-video-url">
                                <i class="fa fa-video-camera"></i>
                            </label>
                        </li>
                    </ul>
                    <button type="submit">Publish</button>
                </div>
                <div id="media-preview" style="margin-top: 10px;"></div>
            </form>
        </div>
    </div>
@endif

@endsection