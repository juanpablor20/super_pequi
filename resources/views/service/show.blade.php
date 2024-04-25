@extends('tablar::page')

@section('title', 'View Service')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                  
                    <h2 class="page-title">
                        {{ __('servicio') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('home') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                           volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalles del servicio</h3>
                        </div>
                        <div class="card-body">
                            

<div class="form-group">
<strong>fecha del prestamo:</strong>
{{ $service->date_ser }}
</div>
<div class="form-group">
<strong>estado del servicio:</strong>
{{ $service->state_ser }}
</div>
<h2>informacion del solicitante del servicio</h2>
<div class="form-group">
<strong>nombre:</strong>
{{ $service->Users->names }}
</div>
<div class="form-group">
    <strong>apellido:</strong>
    {{$service->Users->last_name}}
</div>
<div class="form-grup">
    <strong>tipo de identificacion</strong>
    {{$service->Users->type_identification}} 
</div>
<div class="form-group">
    <strong>numero de identificacion</strong>
    {{$service->Users->number_identification}}
</div>
<div class="form-group">
    <strong>sexo</strong>
    {{$service->Users->sex_user}}
</div>
<div class="form-group">
    <strong>telefono:</strong>
    {{$service->Users->contacts->telephone_con}}
</div>
<h2>informacion del equipo</h2>
<div class="form-grup">
    <strong>tipo de equipo</strong>
    {{$service->equipment->type_equi}}
</div>
<div class="form-group">
    <strong>caracteristicas</strong>
    {{$service->equipment->characteristics}}
</div>
<div class="form-group">
    <strong>Numero de Serie</strong>
    {{$service->equipment->serie_equi}}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Muestra el mensaje de éxito utilizando SweetAlert2
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '{{ session('success') }}',
            confirmButtonText: 'Aceptar',
            showCancelButton: true, // Muestra el botón de cancelar
           // cancelButtonText: 'Ver usuario', // Texto del botón de cancelar
            cancelButtonColor: '#3085d6', // Color del botón de cancelar
            reverseButtons: true // Invierte el orden de los botones (Aceptar y Cancelar)
        })
        
    </script>
@endif
@endsection


