
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordIcons = document.querySelectorAll('.toggle-password');
    
    togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            const passwordField = this.previousElementSibling;
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    });
});


var settingsMenu = document.querySelector(".settings-menu");


function settingsMenuToggle(){
    settingsMenu.classList.toggle("settings-menu-height");
}

// -----------dark mode button------------

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
    document.body
.classList.add("dark-theme");
}
else {
localStorage.setItem("theme", "light");
}
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