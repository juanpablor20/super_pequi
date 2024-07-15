@extends('tablar::page')

@section('title', 'Ver Servicio')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Servicio') }}
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
                            Volver
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
                            <h3 class="card-title">Detalles del Servicio</h3>
                        </div>
                        <div class="card-body">
                            <x-card>
                                <x-slot:header>
                                    <h3 class="card-title">Información del Préstamo</h3>
                                </x-slot:header>
                                <x-slot:stamp>
                                    <div class="card-stamp-icon bg-yellow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5v14m-7-7h14"/>
                                        </svg>
                                    </div>
                                </x-slot:stamp>
                                <x-slot:body>
                                    <div class="form-group">
                                        <strong>Fecha del préstamo:</strong>
                                        {{ $service->date_ser }}
                                    </div>
                                    
                                    <div class="form-group">
                                        <strong>Estado del servicio:</strong>
                                        {{ $service->status }}
                                    </div>
                                </x-slot:body>
                            </x-card> <br> 
                            
                            <x-card>
                                <x-slot:header>
                                    <h3 class="card-title">Información del Usuario</h3>
                                </x-slot:header>
                                <x-slot:stamp>
                                    <div class="card-stamp-icon bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 7c1.5 0 2 .5 3 2s1.5 2 3 2"/>
                                            <path d="M12 7c-1.5 0 -2 .5 -3 2s-1.5 2 -3 2"/>
                                            <path d="M12 7v10"/>
                                            <path d="M10 17h4"/>
                                        </svg>
                                    </div>
                                </x-slot:stamp>
                                <x-slot:body>
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        {{ $service->Users->names }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Apellido:</strong>
                                        {{ $service->Users->last_name }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Tipo de identificación:</strong>
                                        {{ $service->Users->type_identification }} 
                                    </div>
                                    <div class="form-group">
                                        <strong>Número de identificación:</strong>
                                        {{ $service->Users->number_identification }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Sexo:</strong>
                                        {{ $service->Users->sex_user }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Teléfono:</strong>
                                        {{ $service->Users->contacts->telephone_con }}
                                    </div>
                                </x-slot:body>
                            </x-card>

                            <x-card>
                                <x-slot:header>
                                    <h3 class="card-title">Información del Equipo</h3>
                                </x-slot:header>
                                <x-slot:stamp>
                                    <div class="card-stamp-icon bg-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7h16M4 7c-.662 0-1.024 0-1.276.057A2 2 0 0 0 2 8c-.057.252-.057.614-.057 1.276v5.448c0 .662 0 1.024.057 1.276a2 2 0 0 0 1.276 1.276c.252.057.614.057 1.276.057h16c.662 0 1.024 0 1.276-.057a2 2 0 0 0 1.276-1.276c.057-.252.057-.614.057-1.276V9.276c0-.662 0-1.024-.057-1.276a2 2 0 0 0-1.276-1.276c-.252-.057-.614-.057-1.276-.057H4"/>
                                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
                                        </svg>
                                    </div>
                                </x-slot:stamp>
                                <x-slot:body>
                                    <div class="form-group">
                                        <strong>Tipo de equipo:</strong>
                                        {{ $service->equipment->type_equi }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Características:</strong>
                                        {{ $service->equipment->characteristics }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Número de serie:</strong>
                                        {{ $service->equipment->serie_equi }}
                                    </div>
                                </x-slot:body>
                            </x-card>

                            <x-card>
                                <x-slot:header>
                                    <h3 class="card-title">Información del Entorno</h3>
                                </x-slot:header>
                                <x-slot:stamp>
                                    <div class="card-stamp-icon bg-red">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 7c1.5 0 2 .5 3 2s1.5 2 3 2"/>
                                            <path d="M12 7c-1.5 0 -2 .5 -3 2s-1.5 2 -3 2"/>
                                            <path d="M12 7v10"/>
                                            <path d="M10 17h4"/>
                                        </svg>
                                    </div>
                                </x-slot:stamp>
                                <x-slot:body>
                                    <div class="form-group">
                                        <strong>Trasladado a:</strong>
                                        {{ $service->environment->names }}
                                    </div>
                                </x-slot:body>
                            </x-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
