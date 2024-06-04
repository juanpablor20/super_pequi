
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
            background-color: #082bf3ce; /* Color de fondo */
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

        .container {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.btnfos {
  color: #fff;
  background-color: #333;
  cursor: pointer;
  display: block;
  font-size: 16px;
  font-weight: 400;
  line-height: 45px;
  max-width: 160px;
  margin: 0 auto 5em;
  position: relative;
  text-transform: uppercase;
  vertical-align: middle;
  width: 100%;
  text-align: center;
  border-radius: 20%;
  border-color: white;

}
@media (min-width: 400px) {
  .btnfos {
    display: inline-block;
    margin-right: 2.5em;
  }
  .btnfos:nth-of-type(even) {
    margin-right: 0;
  }
}
@media (min-width: 600px) {
  .btnfos:nth-of-type(even) {
    margin-right: 2.5em;
  }
  .btnfos:nth-of-type(5) {
    margin-right: 5px;
  }
}
        .btnfos-5 {
            border-color: #fff
  /* border: 0 solid; */
  box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
  outline: 1px solid;
  outline-color: rgba(255, 255, 255, 0);
  outline-offset: 0px;
  text-shadow: none;
  -webkit-transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
          transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
  outline-color: rgba(255, 255, 255, 0.5);
  outline-offset: 0px;
}

.btnfos-5:hover {
  border: 5px solid;
  box-shadow: inset 0 0 20px rgba(31, 238, 4, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
  outline-offset: 15px;
  outline-color: rgba(255, 255, 255, 0);
  text-shadow: 1px 1px 2px #ffffff;
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

        <div ">
            <img src="{{ asset('assets/PcFlex-logo.png') }}" alt="Logo PCFlex">
        </div>

        <div class="container">
            <a href="{{ route('login') }}" class="btnfos btnfos-5">Login</a>
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
