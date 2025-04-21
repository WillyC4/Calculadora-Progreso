<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Estudiantes')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 5px;
        }
        .navbar-brand {
            font-size: 1.5em;
            font-weight: bold;
            color: white;
        }
        .btn-custom {
            background-color: #ffcc00;
            color: #333;
            font-size: 1.2em;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #ffb300;
            color: black;
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

    <!-- Header con título y botón de regreso -->
    <nav class="navbar">
        <span class="navbar-brand">Calculadora de Progresos</span>
        <a href="{{ route('welcome') }}" class="btn btn-custom">
            <i class="fas fa-arrow-left"></i> Volver a Inicio
        </a>
    </nav>

    <!-- Contenido dinámico -->
    <div class="container">
        {{ $slot }}
    </div>

</body>
</html>