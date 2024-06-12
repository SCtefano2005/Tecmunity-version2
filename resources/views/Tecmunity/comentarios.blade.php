@extends('main')

@section('title', 'Tecmunity')

@section('contenido')



<div class="main-content">
   
    

    <div class="write-post-container">
    
        <div class="row border-radius">
            <div class="feed">
                <div class="feed_title">
                    <a href="{{ route('publicaciones.index') }}" class="back-button">
                        <img style="height: 20px;width:20px" src="{{ asset('img/flecha.png') }}" alt="Volver a publicaciones" class="back-image">
                    </a>
                    <b style="margin-left: 20px">Post</b>
                </div>
                <div class="feed_author">
                    @if($publicacion->usuario->avatar)
                        <img src="{{ $publicacion->usuario->avatar }}" alt="{{ $publicacion->usuario->nombre }}" class="avatar">
                    @else
                        <img src="{{ asset('img/default-avatar.jpg') }}" alt="Default Avatar" class="avatar">
                    @endif
                    <div class="author_info">
                        <a href="{{ route('perfil.show', ['id' => $publicacion->usuario->id]) }}">
                            <b>{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}</b>
                        </a>
                    </div>
                </div>
                <div class="feed_content">
                    <p class="post-text">{{ $publicacion->contenido }}</p>
                </div>
            </div>
        </div>
        
         
        
       
        <div class="user-profile">
            <img src="{{auth()->user()->avatar}}">
            <div>
                <p>{{auth()->user()->nombre}} {{auth()->user()->apellido}}</p>
                
            </div>
        </div>
              
           
        
        

        
        <div class="post-input-container">
          
            <form method="POST" action="{{ route('comentarios.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="publicacion_id" value="{{$publicacion->ID_publicacion}}">
                <div class="publish_textarea">
                    @if(auth()->user()->avatar)
                        
                    @else
                        <img class="border-radius-image" src="{{ asset('img/default-avatar.jpg') }}" alt="Avatar" />
                    @endif
                    <textarea name="contenido" placeholder="¿Qué opinas, {{ auth()->user()->nombre }}?" style="resize: none;"></textarea>
                </div>
                <div class="publish_icons">
                    <ul>
                        <li>
                            <input type="file" name="media" accept="image/,video/" style="display: none;" id="input-media" onchange="previewMedia(event)">
                            <label for="input-media">
                                <i class="fa fa-camera"></i>
                            </label>
                        </li>
                    </ul>
                    <button type="submit">Comentar</button>
                </div>
                <div id="media-preview" style="margin-top: 10px;"></div>
            </form> 
            
        </div>
        
        
    </div>

    @foreach($comentarios as $publicacion)
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
                    <a href="{{ $publicacion->video_url }}" >{{ $publicacion->video_url }}</a>
                </div>
            @endif
        </div>
        
        <div class="post-row">
            <div class="activity-icons">
                <div class="like-container">
                    @if ($publicacion->likes->where('ID_usuario', Auth::id())->isEmpty())
                        <form action="{{ route('like.comentario', $publicacion->ID_publicacion) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="like-button">
                                <img src="{{ asset('img/like.png') }}" alt="Like">
                            </button>
                        </form>
                    @else
                        <form action="{{ route('unlike.comentario', $publicacion->ID_publicacion) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="like-button">
                                <img src="{{ asset('img/like-blue.png') }}" alt="Unlike">
                            </button>
                        </form>
                    @endif
                    <p class="like-count">{{ $publicacion->likes->count() }}</p>
                </div>
                
                <a href="{{ route('comentario.show', ['id' => $publicacion->ID_publicacion]) }}" >
                <img  src="{{ asset('img/comments.png') }}"> 
                </a>

                
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

</div>

<!-- Barra lateral derecha -->



    <!-- Se omite la lista en línea debido a su extensión -->
</div>
</div>

<div class="footer">
    <p>Derechos de autor 2024- Tecmunity</p>
</div>
@endsection
