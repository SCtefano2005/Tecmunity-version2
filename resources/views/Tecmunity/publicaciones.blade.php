@extends('main')

@section('title', 'Tecmunity')

@section('contenido')

<div class="main-content">
    <div class="row">
        <div class="col-lg-8">
            <!-- Sección de Publicaciones -->
            <div class="write-post-container">
                
                    <div class="user-profile">
                        <img src="{{ auth()->user()->avatar }}" alt="Avatar">
                        <div>
                            <p style="color:gray">{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
                        </div>
                    </div>
                    <div class="post-input-container">
                        <form id="publicarForm" method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data" style="display: flex; align-items: center;">
                            @csrf
                            <textarea rows="3" name="contenido" placeholder="¿Qué tienes en mente, {{ auth()->user()->nombre }}?" style="resize: none;"></textarea>
                            <div class="add-post-links">
                                <a href="#" style="align-items: flex-end;margin-left:20px" onclick="document.getElementById('input-video-url').style.display = 'block'; document.getElementById('input-media').style.display = 'none'; document.getElementById('input-video-url').focus(); return false;"><img src="{{ asset('img/live-video.png') }}"> Videos</a>
                                <a href="#" style="align-items: flex-end;" onclick="document.getElementById('input-media').style.display = 'block'; document.getElementById('input-video-url').style.display = 'none'; document.getElementById('input-media').click(); return false;"><img src="{{ asset('img/photo.png') }}"> Foto</a>
                            </div>
                            <input type="hidden" name="from" value="{{ Request::is('perfil/*') ? 'perfil' : 'publicaciones' }}">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="file" name="media" accept="image/*,video/*" style="display: none;" id="input-media" onchange="previewMedia(event)">
                            <input type="url" name="video_url" placeholder="Video URL" style="display: none;" id="input-video-url" onchange="showVideoPreview(event)">
                            <img src="https://w7.pngwing.com/pngs/841/271/png-transparent-computer-icons-send-miscellaneous-angle-triangle-thumbnail.png" alt="Publicar" style="width: 20px; height: 20px; cursor: pointer; margin-left:70px ; margin-right: 10px;" onclick="document.getElementById('publicarForm').submit();">
                        </form>
                    </div>
            
                @foreach($publicaciones as $publicacion)
                    <div class="post-container">
                        <div class="post-row">
                            <div class="user-profile">
                                <img src="{{ $publicacion->usuario->avatar ? $publicacion->usuario->avatar : asset('img/default-avatar.jpg') }}" alt="Avatar">
                                <div class="user-info">
                                    <p>
                                        <a href="{{ route('perfil.show', ['id' => auth()->id()]) }}" class="text-muted">
                                            {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}
                                        </a>
                                    </p>
                                    <span class="text-muted">{{ $publicacion->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="report-content">
                                    <a href="#">
                                        <img src="{{ asset('img/file.png') }}" alt="Report" style="width: 40px; height: 40px;">
                                    </a>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                        </div>
                        <p class="text-muted post-text">{{ $publicacion->contenido }}</p>
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
                            <div class="feed_content_image"></div>
                            @if($publicacion->video_url)
                                <div class="feed_content_video">
                                    <a href="{{ $publicacion->video_url }}">{{ $publicacion->video_url }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="post-row">
                            <div class="activity-icons">
                                <div class="like-container">
                                    @if ($publicacion->likes->where('ID_usuario', Auth::id())->isEmpty())
                                        <form action="{{ route('like.publicacion', $publicacion->ID_publicacion) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="like-button">
                                                <img src="{{ asset('img/like.png') }}" alt="Like">
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('unlike.publicacion', $publicacion->ID_publicacion) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="like-button">
                                                <img src="{{ asset('img/like-blue.png') }}" alt="Unlike">
                                            </button>
                                        </form>
                                    @endif
                                    <p class="like-count">{{ $publicacion->likes->count() }}</p>
                                </div>
                                <a href="{{ route('comentario.show', ['id' => $publicacion->ID_publicacion]) }}" class="comentario-link">
                                    <img src="{{ asset('img/comments.png') }}" class="comentario-img">
                                    <span class="comentario-count">{{ $publicacion->comentarios->count() }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Sección de Noticias -->
            <div class="container mt-5">
                <h2 class="text-center mb-4" style="margin-top: -70px; margin-left:150px;">Noticias</h2>

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('img/licenciamiento.jpeg') }}" alt="Descripción de la imagen">
                            <div class="card-body" style="width:300px;margin-right  :100px">
                                <h4 class="card-title">Tecsup el unico Instituto con licencia</h4>
                                <p class="card-text">Somos el unico Instituto con licenciamiento de la SUNEDU por eso Tecsup >> Senati</p>
                            </div>
                            <div class="card-footer">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('img/primera.png') }}" alt="Descripción de la imagen">

                            <div class="card-body">
                                <h4 class="card-title">Estudia y aprende en Tecsup</h4>
                                <p class="card-text">Entra y estudia en Tecsup el instituto del futuro, donde encontraras chamba altoque.</p>
                            </div>
                            <div class="card-footer">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('img/becas.jpeg') }}" alt="Descripción de la imagen">
                            <div class="card-body">
                                <h4 class="card-title">Becas de Tecsup</h4>
                                <p class="card-text">Opta por una beca de los diferentes convenios que tiene Tecsup con otra empresas y asi poder pagarte tu carrera elegida.</p>
                            </div>
                            <div class="card-footer">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Script para cambiar la pestaña activa
        document.getElementById('for-you').addEventListener('click', function() {
            setActiveTab('for-you');
        });
        document.getElementById('following').addEventListener('click', function() {
            setActiveTab('following');
        });
    
        function setActiveTab(tabId) {
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
        }
    </script>
    <div class="footer mt-5">
        <p>Derechos de autor 2024- Tecmunity</p>
    </div>
    @endsection
     
                   
