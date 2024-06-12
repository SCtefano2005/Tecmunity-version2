<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SocialBook - Easy Tutorials YouTube Channel')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    @include('partials.navbar')

    

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div  style="margin-left:-100px" class="left-sidebar">
                    <div class="imp-links">
                        <a class="navbar-brand" href="{{ route('publicaciones.index') }}">
                            <div class="logo-container">
                                <img src="{{ asset('img/logotec.png') }}" class="logo" alt="Logo Tec">
                            </div>
                        </a>
                        <a href="#" id="friends-link"><img src="{{ asset('img/friends.png') }}"> Amigos</a>
                        <a href="#" id="groups-link"><img src="{{ asset('img/group.png') }}"> Grupos <span class="arrow"></span></a>
                    </div>
                
                    <div id="groups-content" class="accordion hidden">
                        <ul id="departamentos-list">
                            @foreach ($departamentos as $departamento)
                                <li>
                                    <h3 style="font-size: 15px">{{ $departamento->nombre }}</h3>
                                    <div class="accordion-content">
                                        <ul>
                                            @foreach ($departamento->carreras as $carrera)
                                                <li><a href="#" class="no-link open-modal">{{ $carrera->nombre }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <ul class="list-unstyled">
                        <li class="notification">
                            <img src="{{ asset('img/notification.png') }}" alt="Notificaciones">
                            <span class="text-style">Notificaciones</span>
                        </li>
                        <li class="message">
                            <img src="{{ asset('img/inbox.png') }}" alt="Mensajes">
                            <span class="text-style">Mensajes</span>
                        </li>
                    </ul>
                    
                    <div class="shortcut-links">
                        <p>Tus Accesos Directos</p>
                        <a href="#"><img src="{{ asset('img/shortcut-1.png') }}"> Desarrolladores Web</a>
                        <a href="#"><img src="{{ asset('img/shortcut-2.png') }}"> Curso de Diseño Web</a>
                        <a href="#"><img src="{{ asset('img/shortcut-3.png') }}"> Desarrollo Full Stack</a>
                        <a href="#"><img src="{{ asset('img/shortcut-4.png') }}"> Expertos en Sitios Web</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-9">
                <!-- Contenido Principal -->
                @yield('contenido')
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">¿Quieres unirte al grupo de {{$carrera->nombre}} <span id="nombreCarrera"></span>?</h5>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Botones estilizados -->
                    <button class="btn btn-primary mr-2" onclick="joinGroup()">Sí</button>
                    <button class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>

    

        
    </div>

    <!-- JavaScript al final del cuerpo -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
            document.addEventListener('DOMContentLoaded', function() {
                $('.accordion h3').click(function() {
                    $(this).toggleClass('active');
                    var panel = $(this).next();
                    if (panel.css('max-height') == '0px') {
                        panel.css('max-height', panel[0].scrollHeight + 'px');
                    } else {
                        panel.css('max-height', '0px');
                    }
                });

                // Mostrar modal al hacer clic en un enlace de carrera
                $('.open-modal').click(function(event) {
                    event.preventDefault();
                    $('#myModal').css('display', 'block');
                });

                // Cerrar modal al hacer clic en la 'x'
                $('.close').click(function() {
                    $('#myModal').css('display', 'none');
                });

                // Cerrar modal al hacer clic fuera del contenido del modal
                window.onclick = function(event) {
                    if (event.target == $('#myModal')[0]) {
                        $('#myModal').css('display', 'none');
                    }
                };

                // Cerrar contenido del grupo
                document.getElementById('groups-link').addEventListener('click', function(event) {
                    event.preventDefault();
                    var groupsContent = document.getElementById('groups-content');
                    var arrowIcon = document.querySelector('#groups-link .arrow');
                    var isHidden = groupsContent.classList.contains('hidden');
        
                    if (isHidden) {
                        groupsContent.classList.remove('hidden');
                        groupsContent.style.maxHeight = groupsContent.scrollHeight + 'px';
                        arrowIcon.classList.add('rotate');
                    } else {
                        groupsContent.style.maxHeight = '0';
                        arrowIcon.classList.remove('rotate');
                        setTimeout(function() {
                            groupsContent.classList.add('hidden');
                        }, 300); // Espera a que termine la animación antes de ocultar completamente
                    }
                });

                // Asignar el modo oscuro si está en localStorage
                var currentTheme = localStorage.getItem("theme");
                if (currentTheme === "dark") {
                    document.body.classList.add("dark-theme");
                    document.getElementById("dark-btn").classList.add('dark-btn-on');
                } else {
                    document.body.classList.add("light-theme");
                }
            });

            // Función para alternar entre el modo oscuro y claro
            function toggleDarkMode() {
                var darkBtn = document.getElementById("dark-btn");
                var body = document.body;
                var currentTheme = localStorage.getItem("theme");

                if (currentTheme === "dark") {
                    darkBtn.classList.remove('dark-btn-on');
                    body.classList.remove("dark-theme");
                    body.classList.add("light-theme");
                    localStorage.setItem("theme", "light");
                } else {
                    darkBtn.classList.add('dark-btn-on');
                    body.classList.remove("light-theme");
                    body.classList.add("dark-theme");
                    localStorage.setItem("theme", "dark");
                }
            }
            // JavaScript utilizando jQuery
            $('.grupo-carrera').click(function() {
    var nombreCarrera = $(this).data('carrera');
    $('#nombreCarrera').text(nombreCarrera);
});


        </script>


    </body>
    </html>
