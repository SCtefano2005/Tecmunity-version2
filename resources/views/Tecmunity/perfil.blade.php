<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecMunity</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        /* Estilos CSS para el recorte y redimensionamiento de imágenes */
        .profile-pic {
            width: 150px; /* Ancho máximo del avatar */
            height: 150px; /* Altura máxima del avatar */
            object-fit: cover; /* Cubrir todo el contenedor */
            border-radius: 50%; /* Forma de círculo para el avatar */
        }

        .portada {
            width: 100%; /* Ancho completo de la portada */
            max-height: 200px; /* Altura máxima de la portada */
            object-fit: cover; /* Cubrir todo el contenedor */
        }
    </style>
</head>
<body>
    
    @include('partials.navbar')

    <!-- ----profile page --------- -->

    <!-- Div para la portada -->
    <div class="profile-container"> 
        @if($perfil->portada)
            <img id="portada" class="portada" src="{{ $perfil->portada }}" onclick="openModal('{{ $perfil->portada }}')" />
        @else
            <img id="portada" class="portada" src="{{ asset('img/bl.jpg') }}" onclick="openModal('{{ asset('img/bl.jpg') }}')" />
        @endif
    </div>
    
    <!-- Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="imgModal">
    </div>
    

    <!-- Div para el avatar -->
    <div class="profile-details">
        <div class="pd-left">
            <div class="pd-row">
                <!-- Avatar -->
                @if($perfil->avatar)
                    <img id="profile_pic" class="profile-pic" src="{{$perfil->avatar }}" />
                @else
                    <img id="profile_pic" class="profile-pic" src="{{ asset('img/default-avatar.jpg') }}" />
                @endif
                    <div>
                        <h3>{{ $perfil->nombre}} {{$perfil->apellido }}</h3>
                        <p>120 Amigos - 20 en comun</p>
                        <img src="{{ asset('img/member-1.png') }}">
                        <img src="{{ asset('img/member-2.png') }}">
                        <img src="{{ asset('img/member-3.png') }}">
                        <img src="{{ asset('img/member-4.png') }}">
                    </div>
                </div>
            </div>
            <div class="pd-right">
                <button type="button"><img src="{{ asset('img/add-friends.png') }}"> Amigo</button>
                <button type="button"><img src="{{ asset('img/message.png') }}"> Mensaje</button>
                <br>
                <a href=""><img src="{{ asset('img/more.png') }}"></a>
            </div>
        </div>
    
        <div class="profile-info">
            <div class="info-col">
                <div class="profile-intro">
                    @if($perfil->id == auth()->user()->id)
                    <div class="pi-input pi-input-lgg">
                      
                        <form id="biografiaForm" action="{{ route('profile.updateBiografia') }}" method="POST">
                         
                            @csrf
                            <span>Biografía</span>
                            <textarea id="biografiaInput" name="biografia" class="biografia-textarea" placeholder="Una pequeña info sobre ti...">{{ $perfil->biografia }}</textarea>
                        </form>
                      
                    </div>
                     @else
                     <div>
                        <span>Biografía</span>
                        <p>{{ $perfil->biografia }}</p>
                    </div>
                    @endif  
                    <script>
                        document.getElementById("biografiaInput").addEventListener("keyup", function(event) {
                     
                            if (event.key === "Enter") {
                          
                                event.preventDefault();
                                // Enviar el formulario
                                document.getElementById("biografiaForm").submit();
                            }
                        });
                    </script>
                    
                    
                    <hr>
                    <ul style="position: relative;">
                        @if(auth()->user()->carrera)
                        <li><img src="{{ asset('img/profile-job.png') }}"> Carrera: {{ auth()->user()->carrera->nombre }}</li>
                        @endif
                        <li><img src="{{ asset('img/profile-study.png') }}"> Nombre: {{ auth()->user()->nombre }}</li>
                        <li><img src="{{ asset('img/profile-study.png') }}"> Apellido: {{ auth()->user()->apellido }}</li>
                        <li><img src="{{ asset('img/profile-home.png') }}"> Email: {{ auth()->user()->email }}</li>
                        <li>
                            <img src="{{ asset('img/profile-location.png') }}">
                            @php
                                // Obtener la fecha de nacimiento del usuario
                                $fecha_nacimiento = auth()->user()->fecha_nacimiento;
                                // Convertir la fecha de nacimiento a un objeto DateTime
                                $fecha_nacimiento = new DateTime($fecha_nacimiento);
                                // Obtener la fecha actual
                                $fecha_actual = new DateTime();
                                // Calcular la diferencia de años entre la fecha actual y la fecha de nacimiento
                                $edad = $fecha_nacimiento->diff($fecha_actual)->y;
                                // Formatear la fecha de nacimiento en el nuevo formato (día de mes del año)
                                setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional en español
                                $fecha_nacimiento_formateada = strftime('%e de %B de %Y', $fecha_nacimiento->getTimestamp());
                            @endphp
                            Fecha de Nacimiento: {{ $fecha_nacimiento_formateada }} ({{ $edad }} años)
                        </li>
                        <li><img src="{{ asset('img/profile-location.png') }}"> Género: {{ auth()->user()->sexo }}</li>
                        <li><img src="{{ asset('img/profile-location.png') }}"> Perfil: {{ auth()->user()->privado ? 'Privado' : 'Público' }}</li>
                     @if($perfil->id == auth()->user()->id)
                        <li style="position: absolute; top: 0; right: 0;">
                            <a href="{{ route('infoPersonal') }}" style="font-size: 12px; text-decoration: none; color: #000;">
                                Editar Perfil
                            </a>
                        </li>
                     @endif
                    </ul>
                    
                    
                </div>
                
                <div class="profile-intro">
                    <div class="title-box">
                        <h3>Fotos</h3>
                        <a href="">Todas las fotos</a>
                    </div>
                    
                    <div class="photo-box">
                        @foreach ($publicaciones as $publicacion) 
                        
                      
                        <div><img src="{{$publicacion->url_media}}"></div>
                        
                        @endforeach
                    </div>
                </div>
                
                <div class="profile-intro">
                    <div class="title-box">
                        <h3>Amigos</h3>
                        <a href="">Todos los amigos</a>
                    </div>
                    <p>120(10 mutuos)</p>
                    <div class="friends-box">
                        <div><img src="{{ asset('img/member-1.png') }}"> <p>Joseph N</p></div>
                        <div><img src="{{ asset('img/member-2.png') }}"> <p>Nathan N</p></div>
                        <div><img src="{{ asset('img/member-3.png') }}"> <p>George D</p></div>
                        <div><img src="{{ asset('img/member-4.png') }}"> <p>Francis L</p></div>
                        <div><img src="{{ asset('img/member-5.png') }}"> <p>Anthony E</p></div>
                        <div><img src="{{ asset('img/member-6.png') }}"> <p>Michael A</p></div>
                        <div><img src="{{ asset('img/member-7.png') }}"> <p>Edward M</p></div>
                        <div><img src="{{ asset('img/member-8.png') }}"> <p>Bradon C</p></div>
                        <div><img src="{{ asset('img/member-9.png') }}"> <p>James Doe</p></div>
                    </div>
                </div>
                
            </div>
         
            <div class="post-col">
                    
                    @if($perfil->id == auth()->user()->id)
                    <div class="write-post-container">
                     <div class="user-profile">
                            <img src="{{ $publicacion->usuario->nombre? $publicacion->usuario->avatar : asset('img/profile-pic.png') }}">
                            <div>
                                <p>{{ $publicacion->usuario->nombre }} {{$publicacion->usuario->apellido }}</p>
                                <small>{{ $publicacion->usuario->privado ? 'Privado' : 'Público' }} <i class="fas fa-caret-down"></i></small>
                            </div>
                        </div>
                      <div class="post-input-container">
                            <form id="publicarForm" method="POST" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data" style="display: flex; align-items: center;">
                             @csrf
                             <textarea rows="3" name="contenido" placeholder="¿Qué tienes en mente, {{ $publicacion->usuario->nombre}}?" style="resize: none;"></textarea>
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
                       @endif
                  

                
                @foreach($publicaciones as $publicacion)
                    <div class="post-container">
                        <div class="post-row">
                            <div class="user-profile">
                                <img src="{{ $publicacion->usuario->avatar ? $publicacion->usuario->avatar : asset('img/profile-pic.png') }}">
                                <div>
                                    <p>{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}</p>
                                    <span>{{ $publicacion->created_at->format('d \d\e F \d\e Y, H:i A') }}</span>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                        </div>
                        <p class="post-text">{{ $publicacion->contenido }}</p>
                        @if($publicacion->url_media)
                            @if($publicacion->isVideo())
                                <video controls class="post-img">
                                    <source src="{{ $publicacion->url_media}}" type="video/mp4">
                                    Tu navegador no soporta la etiqueta de video.
                                </video>
                            @else
                                <img src="{{ $publicacion->url_media }}" class="post-img">
                            @endif
                        @endif
                        <div class="post-row">
                            <div class="activity-icons">
                                <div><img src="{{ asset('img/like-blue.png') }}"> {{ $publicacion->nro_likes }}</div>
                                <div><img src="{{ asset('img/comments.png') }}"> {{ $publicacion->nro_comentarios }}</div>
                                <!-- Agrega aquí el icono de compartir y la cantidad de veces que se ha compartido -->
                            </div>
                            <div class="post-profile-icon">
                                <img src="{{ $publicacion->usuario->avatar ? $publicacion->usuario->avatar : asset('img/profile-pic.png') }}"> <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
            
    <div class="footer">
        <p>Derechos de autor 2021 - Canal de YouTube Easy Tutorials</p>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

