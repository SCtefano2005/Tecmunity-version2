@extends('main')

@section('title', 'Tecmunity')

@section('contenido')
<div class="right_row">
    <div class="row">
        <div class="publish">
            <div class="row_title">
                <span><i class="fa fa-newspaper-o" aria-hidden="true"></i> Status</span>
            </div>
            <form method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="publish_textarea">
                    <a href="{{ route('perfil.show', ['id' => auth()->user()->id]) }}">
                        @if(auth()->user()->avatar)
                        <img class="border-radius-image" src="{{ auth()->user()->avatar }}" alt="" />
                        @else
                            <img class="border-radius-image" src="{{ asset('img/default-avatar.jpg') }}" />
                        @endif
                    </a>
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
                    </ul>
                    <button type="submit">Publicar</button>
                </div>
                <div id="media-preview" style="margin-top: 10px;"></div>
            </form>
        </div>
    </div>
    @foreach($publicaciones as $publicacion)
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
                        <a href="{{ route('comentario.show', ['id' => $publicacion->ID_publicacion]) }}" style="color:#515365;">
                            <li class="hover-orange"><i class="fa fa-comments-o"></i> {{ $publicacion->comentarios->count() }} comentarios</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="suggestions_row">
    <div class="row shadow">
        <div class="row_title">
            <span>Sugerencias de amigos</span>
            <a href="friends.html">ver más..</a>
        </div>
        <div class="row_contain">
            <img src="images/user-7.jpg" alt="" />
            <span><b>Francine Smith</b><br>8 amigos en común</span>
            <button>+</button>
        </div>
        <div class="row_contain">
            <img src="images/user-2.jpg" alt="" />
            <span><b>Hugh Wilson</b><br>6 amigos en común</span>
            <button>+</button>
        </div>
        <div class="row_contain">
            <img src="images/user-6.jpg" alt="" />
            <span><b>Karen Masters</b><br>6 amigos en común</span>
            <button>+</button>
        </div>
    </div>
</div>

<script>
    function previewMedia(event) {
        var previewContainer = document.getElementById('media-preview');
        previewContainer.innerHTML = ''; // Clear previous previews
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var previewElement;
                if (file.type.startsWith('image/')) {
                    previewElement = document.createElement('img');
                    previewElement.src = e.target.result;
                    previewElement.style.maxWidth = '200px';
                    previewElement.style.maxHeight = '200px';
                    previewElement.style.display = 'block';
                    previewElement.style.marginTop = '10px';
                } else if (file.type.startsWith('video/')) {
                    previewElement = document.createElement('video');
                    previewElement.src = e.target.result;
                    previewElement.controls = true;
                    previewElement.style.maxWidth = '200px';
                    previewElement.style.maxHeight = '200px';
                    previewElement.style.display = 'block';
                    previewElement.style.marginTop = '10px';
                }
                previewContainer.appendChild(previewElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
