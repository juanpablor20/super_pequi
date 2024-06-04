@extends('tablar::page')

@section('title', 'Equipos')

@section('content')
<div class="col-12 col-md-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('equipment.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Create Equipo
        </a>
    </div>
</div>
@if(config('tablar','display_alert'))
@include('tablar::common.alert')
@endif
<div id="loading-overlay">
    <div class="loader"></div>
    <div id="loading-message">Cargando...</div>
</div>


    <x-tabulator :table="$table"  />

    
  <script >
document.addEventListener("DOMContentLoaded", function() {
    // Muestra el mensaje de carga
    document.getElementById("loading-overlay").classList.add("active");

    // Oculta el mensaje de carga después de 3 segundos (3000 milisegundos)
    setTimeout(function() {
        document.getElementById("loading-overlay").classList.remove("active");
    }, 1000); // Cambia este valor según cuánto tiempo dura la compilación o carga de tu aplicación
});


  </script>
  <style>
   #loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.loader {
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#loading-message {
    color: #333;
    font-size: 24px;
    margin-left: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

#loading-overlay.active {
    opacity: 1;
}

#loading-overlay.active #loading-message {
    opacity: 1;
}


  </style>
@endsection
