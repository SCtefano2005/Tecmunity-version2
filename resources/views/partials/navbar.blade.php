@extends ('main')
@section ('contenido')
<body>
    <nav class="navbar navbar-expand-lg navbar-black bg-gradient-black-gray">

    <div class="container-fluid">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
         

            <form class="form-inline my-2 my-lg-0" action="{{ route('buscar') }}" method="GET" id="search-form">
                <input class="form-control mr-sm-2" type="search" name="termino" placeholder="Buscar personas" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <img src="{{ asset('img/search.png') }}" id="search-icon" alt="Buscar">
                </button>
            </form>
            
            <div class="nav-user-icon online ml-3" onclick="settingsMenuToggle()">
                <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('img/default-avatar.jpg') }}" class="rounded-circle" alt="Avatar">
            </div>
        </div>
    </div>
</nav>

    

    <!-- Dropdown settings menu -->
    <div class="settings-menu">
        <div id="dark-btn" onclick="toggleDarkMode()">
            <span></span>
        </div>
        <div class="settings-menu-inner">
            <div class="user-profile d-flex align-items-center mb-3">
                <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('img/default-avatar.jpg') }}" class="rounded-circle" alt="Avatar">
                <div class="ml-2">
                    <p>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
                    <a href="{{ route('perfil.show', ['id' => auth()->id()]) }}" class="text-muted">Ver tu perfil</a>
                </div>
            </div>
            <hr>
            <div class="user-profile d-flex align-items-center mb-3">
                <img src="{{ asset('img/feedback.png') }}" alt="Feedback">
                <div class="ml-2">
                    <p>Enviar Comentarios</p>
                    <a href="" class="text-muted">Ayúdanos a mejorar el nuevo diseño</a>
                </div>
            </div>
            <hr>
            <div class="settings-links d-flex align-items-center mb-3">
                <img src="{{ asset('img/setting.png') }}" class="settings-icon" alt="Configuración">
                <a href="{{ route('infoPersonal') }}" class="text-dark ml-2">Configuración y Privacidad <img src="{{ asset('img/arrow.png') }}" width="10px" alt="Arrow"></a>
            </div>
            @if (auth()->user()->admin)
            <div class="settings-links d-flex align-items-center mb-3">
                <img src="{{ asset('img/display.png') }}" class="settings-icon" alt="Dashboard">
                <a href="{{ route('dashboard') }}" class="text-dark ml-2">Dashboard <img src="{{ asset('img/arrow.png') }}" width="10px" alt="Arrow"></a>
            </div>
            @endif
            <div class="settings-links d-flex align-items-center">
                <img src="{{ asset('img/logout.png') }}" class="settings-icon" alt="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <a href="{{ route('logout') }}" class="text-dark ml-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión <img src="{{ asset('img/arrow.png') }}" width="10px" alt="Arrow"></a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- JavaScript al final del cuerpo -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Función para alternar la altura del menú de configuración
        function settingsMenuToggle() {
            var settingsMenu = document.querySelector(".settings-menu");
            settingsMenu.classList.toggle("settings-menu-height");
        }

        // Función para enviar el formulario de búsqueda al hacer clic en el ícono de búsqueda
        document.getElementById('search-icon').addEventListener('click', function() {
            document.getElementById('search-form').submit();
        });

        // Función para alternar entre el modo oscuro y claro
        function toggleDarkMode() {
            var darkBtn = document.getElementById("dark-btn");
            var body = document.body;
            var currentTheme = localStorage.getItem("theme");

            if (currentTheme === "dark") {
                darkBtn.classList.remove('dark-btn-on');
                body.classList.remove("dark-theme");
                localStorage.setItem("theme", "light");
            } else {
                darkBtn.classList.add('dark-btn-on');
                body.classList.add("dark-theme");
                localStorage.setItem("theme", "dark");
            }
        }
    </script>
</body>
@endsection
