<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esperando verificación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 0.5s ease;
        }
        h1 {
            color: #333;
        }
        p {
            margin-top: 20px;
            color: #666;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Esperando verificación</h1>
        <p>¡Gracias por registrarte! Hemos enviado un correo electrónico a tu dirección de correo electrónico. Por favor, verifica tu correo electrónico para completar el proceso de registro.</p>
        <a href="http://localhost:3000" class="button">Regresar al inicio de sesión</a>
        <p>Creado por: Dilan Gutierrez, Paulo Garcia y Marcelo Villalva</p>
    </div>
</body>
</html>
