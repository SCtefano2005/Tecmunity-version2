<nav>
    <div class="nav-left">
        <a href="{{ route('publicaciones.index') }}"><img src="{{ asset('img/logotec.png') }}" class="logo"></a>
        <ul>
            <li><img src="{{ asset('img/notification.png') }}"></li>
            <li><img src="{{ asset('img/inbox.png') }}"></li>
            <li><img src="{{ asset('img/video.png') }}"></li>
        </ul>
    </div>

    <div class="nav-right">
        <div class="search-box">
            <img src="{{ asset('img/search.png') }}" id="search-icon">
            <form action="{{ route('buscar') }}" method="GET" id="search-form">
                <input type="text" name="termino" placeholder="Buscar personas">
            </form>
        </div>
        <div class="nav-user-icon online" onclick="settingsMenuToggle()">   
            <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('img/default-avatar.jpg') }}">
        </div>
    </div>

    <script>
        document.getElementById('search-icon').addEventListener('click', function() {
            document.getElementById('search-form').submit();
        });
    </script>

    <!-- Dropdown settings menu -->
    <div class="settings-menu">
        <div id="dark-btn">
            <span></span>
        </div>
        <div class="settings-menu-inner">
            <div class="user-profile">
                <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('img/default-avatar.jpg') }}" alt="Avatar">

                <div>
                    <p>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
                    <a href="{{ route('perfil.show', ['id' => auth()->id()]) }}">Ver tu perfil</a>
                </div>
            </div>
            <hr>
            <div class="user-profile">
                <img src="{{ asset('img/feedback.png') }}">
                <div>
                    <p>Enviar Comentarios</p>
                    <a href="">Ayúdanos a mejorar el nuevo diseño</a>
                </div>
            </div>
            <hr>
            <div class="settings-links">
                <img src="{{ asset('img/setting.png') }}" class="settings-icon">
                <a href="{{ route('infoPersonal') }}">Configuración y Privacidad <img src="{{ asset('img/arrow.png') }}" width="10px"></a>
            </div>
            
            @if (auth()->user()->admin)
            <div class="settings-links">
                <img src="{{ asset('img/display.png') }}" class="settings-icon">
                <a href="{{route('dashboard')}}">Dashboard <img src="{{ asset('img/arrow.png') }}" width="10px"></a>
            </div>
            @endif
            <div class="settings-links">
                <img src="{{ asset('img/logout.png') }}" class="settings-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión <img src="{{ asset('img/arrow.png') }}" width="10px"></a>
            </div>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>
