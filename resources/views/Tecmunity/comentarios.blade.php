@extends('main')

@section('title', 'Tecmunity')

@section('contenido')
    <div class="right_row">
        <div class="row border-radius">
            <div class="feed">
                <div class="feed_title">
                    <span><a href="{{ route('publicaciones.index') }}" class="back-button"><i class="fa fa-arrow-left"></i></a><b style="margin-left: 20px">Post</b></span>
                </div>
            </div>  
        </div>

        <div class="row border-radius">
            <div class="feed">
                <div class="feed_title">
                    <a href="{{ route('perfil.show', ['id' => $publicacion->usuario->id]) }}">
                        @if($publicacion->usuario->avatar)
                            <img src="{{ $publicacion->usuario->avatar }}" />
                        @else
                            <img src="{{ asset('img/default-avatar.jpg') }}"/>
                        @endif
                    </a>
                    <span>
                        <a href="{{ route('perfil.show', ['id' => $publicacion->usuario->id]) }}"><b>{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}</b></a> compartió 
                        @if($publicacion->url_media)
                            <a href="{{ route('perfil.show', ['id' => $publicacion->usuario->id]) }}">{{ $publicacion->isVideo() ? 'un video' : 'una foto' }}</a>
                        @else
                            <a href="{{ route('perfil.show', ['id' => $publicacion->usuario->id]) }}">una publicación</a>
                        @endif
                        <br>
                        <p>{{ $publicacion->created_at->format('d F \a\t h:i A') }}</p>
                    </span>
                </div>
                <div class="feed_content">
                    @if($publicacion->url_media)
                        <div class="feed_content_image">
                            @if($publicacion->isVideo())
                                <video controls style="max-width: 500px; max-height: 500px;">
                                    <source src="{{ $publicacion->url_media }}" type="video/mp4">
                                    Tu navegador no soporta la etiqueta de video.
                                </video>
                            @else
                                <a href="{{ $publicacion->url_media }}" target="_blank">
                                    <img src="{{ $publicacion->url_media }}" alt="" style="max-width: 500px; max-height: 500px; display: block; margin-top: 10px;" />
                                </a>
                            @endif
                        </div>
                    @endif
                    <div class="feed_content_image">
                        <p>{{ $publicacion->contenido }}</p>
                    </div>
                    @if($publicacion->video_url)
                        <div class="feed_content_video">
                            <a href="{{ $publicacion->video_url }}" target="_blank">{{ $publicacion->video_url }}</a>
                        </div>
                    @endif
                </div>
                <div class="feed_footer">
                    <ul class="feed_footer_left">
                        <li class="hover-orange selected-orange"><i class="fa fa-heart"></i> {{ $publicacion->nro_likes }}</li>
                        <li><span><b>{{ $publicacion->usuario->nombre }}</b> y otros les gustó esto</span></li>
                    </ul>
                    <ul class="feed_footer_right">
                        <li class="hover-orange selected-orange"><i class="fa fa-share"></i> 7k</li>
                            <li class="hover-orange"><i class="fa fa-comments-o"></i> {{ $publicacion->comentarios->count() }} comentarios</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="publish">
                <div class="row_title">
                    <span><i class="fa fa-newspaper-o" aria-hidden="true"></i> Comentar</span>
                </div>
                <form method="POST" action="{{ route('comentarios.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="publicacion_id" value="{{ $publicacion->ID_publicacion }}">
                    <div class="publish_textarea">
                        @if(auth()->user()->avatar)
                            <img class="border-radius-image" src="{{ auth()->user()->avatar }}" alt="Avatar" />
                        @else
                            <img class="border-radius-image" src="{{ asset('img/default-avatar.jpg') }}" alt="Avatar" />
                        @endif
                        <textarea name="contenido" placeholder="¿Qué opinas, {{ auth()->user()->nombre }}?" style="resize: none;"></textarea>
                    </div>
                    <div class="publish_icons">
                        <ul>
                            <li>
                                <input type="file" name="media" accept="image/*,video/*" style="display: none;" id="input-media" onchange="previewMedia(event)">
                                <label for="input-media">
                                    <i class="fa fa-camera"></i>
                                </label>
                            </li>
                        </ul>
                        <button type="submit">Publicar</button>
                    </div>
                    <div id="media-preview" style="margin-top: 10px;"></div>
                </form>
            </div>
        </div>

        @foreach($comentarios as $comentario)
    <div class="row border-radius">
        <div class="feed">
            <div class="feed_title">
                <a href="{{ route('perfil.show', ['id' => $comentario->usuario->id]) }}">
                    @if($comentario->usuario->avatar)
                        <img src="{{ $comentario->usuario->avatar }}" />
                    @else
                        <img src="{{ asset('img/default-avatar.jpg') }}"/>
                    @endif
                </a>
                <span>
                    <a href="{{ route('perfil.show', ['id' => $comentario->usuario->id]) }}"><b>{{ $comentario->usuario->nombre }} {{ $comentario->usuario->apellido }}</b></a>
                    <br>
                    <p>{{ $comentario->created_at->format('d F \a\t h:i A') }}</p>
                </span>
            </div>
            <div class="feed_content">
                <div class="feed_content_image">
                    <p>{{ $comentario->contenido }}</p>
                </div>
                @if($comentario->url_media)
                    <div class="feed_content_image">
                        @if($comentario->isVideo())
                            <video controls style="max-width: 500px; max-height: 500px;">
                                <source src="{{ $comentario->url_media }}" type="video/mp4">
                                Tu navegador no soporta la etiqueta de video.
                            </video>
                        @else
                            <a href="{{ $comentario->url_media }}" target="_blank">
                                <img src="{{ $comentario->url_media }}" alt="" style="max-width: 500px; max-height: 500px; display: block; margin-top: 10px;" />
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach


        <script>
            function previewMedia(event) {
                var input = event.target;
                var preview = document.getElementById('media-preview');
        
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function(e) {
                        var fileType = input.files[0].type.split('/')[0];
                        if (fileType === 'image') {
                            preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview" style="max-width: 100%; max-height: 200px;">';
                        } else {
                            preview.innerHTML = '<video controls style="max-width: 100%; max-height: 200px;"><source src="' + e.target.result + '" type="' + input.files[0].type + '">Tu navegador no soporta la etiqueta de video.</video>';
                        }
                    }
        
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.innerHTML = '';
                }
            }
        </script>
@endsection