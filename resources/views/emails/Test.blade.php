<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Verificación de correo electrónico</h1>
    <p>{{ $test_message }}</p>
    <p>Gracias por registrarte en nuestra red social exclusiva del instituto Tecsup. A continuación, te presentamos algunas conclusiones sobre por qué deberías elegir TecMunity:</p>
    <ul>
        <li>Conéctate con otros estudiantes y profesionales de Tecsup.</li>
        <li>Accede a recursos educativos exclusivos.</li>
        <li>Participa en eventos y actividades organizadas por Tecsup.</li>
        <li>Amplía tu red de contactos y oportunidades laborales.</li>
    </ul>
    <p>Por favor, haz clic en el enlace a continuación para verificar tu correo electrónico:</p>
    <a href="{{ $verification_link }}">Verificar correo electrónico</a>
</body>
</html>
