
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCFlex</title>
    <!-- Agrega tus enlaces a los archivos CSS de Bootstrap y tu propio CSS aquí -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #082bf380; /* Color de fondo */
            overflow-x: hidden; /* Evita el desplazamiento horizontal */
            font-family: Arial, sans-serif; /* Tipografía */
            color: #333; /* Color de texto */
        }

        .main-container {
            min-height: 100vh; /* Asegura que el contenedor principal tenga al menos el 100% de la altura de la ventana del navegador */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: #fff; /* Color de fondo del contenedor */
            padding: 20px;
            border-radius: 15px; /* Borde redondeado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra */
            margin-bottom: 30px; /* Espaciado inferior */
            text-align: center; /* Alineación centrada */
        }

        .card img {
            max-width: 100%; /* Imagen ajustada al ancho del contenedor */
            border-radius: 10px; /* Borde redondeado para la imagen */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        .card p {
            margin-bottom: 10px; /* Espaciado inferior */
        }

        .btn-primary {
            background-color: #007bff; /* Color de fondo del botón */
            border-color: #007bff; /* Color del borde del botón */
            padding: 10px 20px; /* Espaciado interno del botón */
            border-radius: 5px; /* Borde redondeado */
            color: #fff; /* Color de texto del botón */
            text-decoration: none; /* Sin subrayado */
            transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Transición suave */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Cambio de color al pasar el ratón */
            border-color: #0056b3; /* Cambio de color del borde al pasar el ratón */
        }
    </style>
</head>
<body>

<div class="main-container">
    <div class="card">
        <div style="margin-bottom: 30px;">
            <img src="{{ asset('assets/avatars/pexels-pixabay-47547.jpg') }}" alt="Desarrollador 1">
            <p><strong>Desarrollador:</strong> Wilmer Vargas Rodriguez</p>
        </div>
    </div>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">

        <div style="margin-bottom: 0px;">
            <img src="{{ asset('assets/PcFlex-logo.png') }}" alt="Logo PCFlex">
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Login</a>
        </div>
        </div>


    <div class="card">
        <div style="margin-bottom: 30px;">
            <img src="{{ asset('assets/avatars/pexels-george-desipris-792381.jpg') }}" alt="Desarrollador 2">
            <p><strong>Desarrollador:</strong> Juan Pablo Ramos Medina</p>
        </div>
    </div>
</div>

</body>
</html>
