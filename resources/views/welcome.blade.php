<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Calculadora de Progresos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
    </style>
</head>
<body>

    <h1 class="font-weight-bold">Bienvenido a la Calculadora de Progresos</h1>
    <p>Optimiza el seguimiento de notas con nuestra herramienta.</p>

    <!-- Botón para ir al Índice -->
    <a href="{{ route('estudiante.index') }}" class="btn btn-custom mt-4">
        <i class="fas fa-arrow-right"></i> Ir a la Calculadora
    </a>

</body>
</html>