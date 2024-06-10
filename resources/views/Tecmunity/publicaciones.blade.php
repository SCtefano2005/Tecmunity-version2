@extends('main')

@section('title', 'Tecmunity')

@section('contenido')



<div class="main-content">
    

    <div class="write-post-container">
        @if(isset($publicacion))
        <div class="user-profile">
            @auth
                <img src="{{ auth()->user()->avatar  }}" alt="Avatar">
                <div>
                    <p><a href="{{ route('perfil.show', ['id' => $publicacion->usuario->id]) }}" class="profile-link">{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}</a></p>
                    <span>{{ $publicacion->usuario->privado ? 'Privado' : 'Público' }} <i class="fas fa-caret-down"></i></span>
                </div>
            @else
                <img src="{{ asset('img/default-avatar.jpg') }}" alt="Avatar">
                <div>
                    <p>{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}</p>
                    <span>Público <i class="fas fa-caret-down"></i></span>
                </div>
            @endauth
        </div>
        
@endif

        
        <div class="post-input-container">
            <form id="publicarForm" method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data" style="display: flex; align-items: center;">
                @csrf
                <textarea rows="3" name="contenido" placeholder="¿Qué tienes en mente, {{ auth()->user()->nombre }}?" style="resize: none;"></textarea>
                <div class="add-post-links">
                    <a href="#" onclick="document.getElementById('input-video-url').style.display = 'block'; document.getElementById('input-media').style.display = 'none'; document.getElementById('input-video-url').focus(); return false;"><img src="{{ asset('img/live-video.png') }}"> Videos</a>
                    <a href="#" onclick="document.getElementById('input-media').style.display = 'block'; document.getElementById('input-video-url').style.display = 'none'; document.getElementById('input-media').click(); return false;"><img src="{{ asset('img/photo.png') }}"> Foto</a>
                </div>
                
                <!-- Campo oculto para enviar el origen del formulario -->
                <input type="hidden" name="from" value="{{ Request::is('perfil/*') ? 'perfil' : 'publicaciones' }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                
                <input type="file" name="media" accept="image/*,video/*" style="display: none;" id="input-media" onchange="previewMedia(event)">
                <input type="url" name="video_url" placeholder="Video URL" style="display: none;" id="input-video-url" onchange="showVideoPreview(event)">
                <img src="https://w7.pngwing.com/pngs/841/271/png-transparent-computer-icons-send-miscellaneous-angle-triangle-thumbnail.png" alt="Publicar" style="width: 20px; height: 20px; cursor: pointer; margin-left: auto;" onclick="document.getElementById('publicarForm').submit();">
            </form>
            
        </div>
        
        
    </div>

    @foreach($publicaciones as $publicacion)
    <div class="post-container">
        <div class="post-row">
            <div class="user-profile">
                <img src="{{ $publicacion->usuario->avatar ? $publicacion->usuario->avatar : asset('img/default-avatar.jpg') }}" alt="Avatar">
                <div>
                    <p><a href="{{ route('perfil.show', ['id' => auth()->id()]) }}">{{$publicacion->usuario->nombre  }} {{ $publicacion->usuario->apellido }}</a></p>
                    <span>{{ $publicacion->created_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
            
            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
        </div>
        <p class="post-text">{{ $publicacion->contenido }}</p>
        <div class="feed_content">
            @if($publicacion->url_media)
                <div class="feed_content_image">
                    @if($publicacion->isVideo())
                        <video controls style="max-width: 500px; max-height: 500px;">
                            <source src="{{ $publicacion->url_media }}" type="video/mp4">
                            Tu navegador no soporta la etiqueta de video.
                        </video>
                    @else
                        <img src="{{ $publicacion->url_media }}" alt="" style="max-width: 500px; max-height: 500px; display: block; margin-top: 10px;" />
                    @endif
                </div>
            @endif
            <div class="feed_content_image">
            
            </div>
            @if($publicacion->video_url)
                <div class="feed_content_video">
                    <a href="{{ $publicacion->video_url }}" target="_blank">{{ $publicacion->video_url }}</a>
                </div>
            @endif
        </div>
        
        <div class="post-row">
            <div class="activity-icons">
                <div><img src="{{ asset('img/like-blue.png') }}"> 120</div>
                <div><img src="{{ asset('img/comments.png') }}"> 45</div>
                <div><img src="{{ asset('img/share.png') }}"> 20</div>

                
            </div>
            <div class="post-profile-icon">
                @if($publicacion->usuario->username)
                    <img src="{{ $publicacion->usuario->avatar}}">
                @else
                    <img src="{{ asset('img/default-avatar.jpg') }}">
                @endif
                <i class="fas fa-caret-down"></i>
            </div>
            
            
        </div>
    </div>
@endforeach


    <!-- Se omiten el resto del contenido de las publicaciones debido a su extensión -->

    <button type="button" class="load-more-btn">Cargar más</button>
</div>

<!-- Barra lateral derecha -->

<div class="right-sidebar">
    <div class="sidebar-title">
        <h4>Eventos</h4>
        <a href="#">Ver todos</a>
    </div>

    <!-- Se omite el contenido de eventos debido a su extensión -->

    <div class="sidebar-title">
        <h4>Publicidad</h4>
        <a href="#">Cerrar</a>
    </div>

    <img src="{{ asset('img/advertisement.png') }}" class="sidebar-ad">

    <div class="sidebar-title">
        <h4>Conversación</h4>
        <a href="#">Ocultar Chat</a>
    </div>

    <!-- Se omite la lista en línea debido a su extensión -->
</div>
</div>

<div class="footer">
    <p>Derechos de autor 2024- Tecmunity</p>
</div>
@endsection
