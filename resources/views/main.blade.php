<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SocialBook - Easy Tutorials YouTube Channel')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>
    
    @include('partials.navbar')
    
    <div class="container">
       <div class="left-sidebar">
           <div class="imp-links">
              
               <a href="#"><img src="{{ asset('img/friends.png') }}"> Amigos</a>
               <a href="#"><img src="{{ asset('img/group.png') }}"> Grupos</a>
             
              
               <a href="#">Ver Más</a>
           </div>
           <div class="shortcut-links">
               <p>Tus Accesos Directos</p>
               <a href="#"><img src="{{ asset('img/shortcut-1.png') }}"> Desarrolladores Web</a>
               <a href="#"><img src="{{ asset('img/shortcut-2.png') }}"> Curso de Diseño Web</a>
               <a href="#"><img src="{{ asset('img/shortcut-3.png') }}"> Desarrollo Full Stack</a>
               <a href="#"><img src="{{ asset('img/shortcut-4.png') }}"> Expertos en Sitios Web</a>
           </div>
       </div>
       
       <!-- Contenido Principal -->
       @yield('contenido')
       
   </div>



   <!-- JavaScript al final del cuerpo -->
   <script src="{{ asset('js/app.js') }}"></script>
   <script>
        var settingsMenu = document.querySelector(".settings-menu");

        function settingsMenuToggle(){
            settingsMenu.classList.toggle("settings-menu-height");
        }

        var darkBtn = document.getElementById("dark-btn");

        darkBtn.onclick = function(){
            darkBtn.classList.toggle('dark-btn-on');
            document.body.classList.toggle("dark-theme");

            if(localStorage.getItem("theme") == "light"){
                localStorage.setItem("theme", "dark");
            }else{
                localStorage.setItem("theme", "light");
            }
        }

        if(localStorage.getItem("theme") == "light"){
            darkBtn.classList.remove('dark-btn-on');
            document.body.classList.remove("dark-theme");
        }
        else if(localStorage.getItem("theme") == "dark"){
            darkBtn.classList.add('dark-btn-on');
            document.body.classList.add("dark-theme");
        }
        else{
            localStorage.setItem("theme", "light");
        }
    </script>
</body>
</html>
