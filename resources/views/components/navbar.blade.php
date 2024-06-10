<nav>
    <!-- Otros elementos de la navbar -->

    @if ($usuario && $usuario->admin == 1)
        <div class="settings-links">
            <img src="{{ asset('img/display.png') }}" class="settings-icon" alt="Settings Icon">
            <a href="{{ route('dashboard') }}">Apariencia y Accesibilidad <img src="{{ asset('img/arrow.png') }}" width="10px" alt="Arrow Icon"></a>
        </div>
    @endif

    <!-- Otros elementos de la navbar -->
</nav>
