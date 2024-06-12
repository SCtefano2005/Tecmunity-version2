<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            color: #007bff;
        }

        p {
            margin-bottom: 15px;
        }

        ul {
            text-align: left;
            margin-bottom: 20px;
        }

        ul li {
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <img src="https://via.placeholder.com/150" alt="Tecsup Logo" class="logo">
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
    </div>
</body>
</html>
