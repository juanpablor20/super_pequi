@extends('tablar::page')

@section('title', 'View Usuario')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        View
                    </div>
                    <h2 class="page-title">
                        {{ __('Usuario ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('bibliotecarios.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Usuario List
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
                    @if (config('tablar', 'display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Usuario Details</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <strong>Nombres:</strong>
                                {{ $usuario->nombres }}
                            </div>
                            <div class="form-group">
                                <strong>Apellidos:</strong>
                                {{ $usuario->apellidos }}
                            </div>
                            <div class="form-group">
                                <strong>Tipo Doc:</strong>
                                {{ $usuario->tipo_doc }}
                            </div>
                            <div class="form-group">
                                <strong>Num Doc:</strong>
                                {{ $usuario->num_doc }}
                            </div>
                            <div class="form-group">
                                <strong>correo:</strong>
                                {{ $usuario->contactos[0]->correo }}
                            </div>
                            <div class="form-group">
                                <strong>numero de telefono:</strong>
                                {{ $usuario->contactos[0]->telefono }}
                            </div>
                            <div class="form-group">
                                <strong>Ciudad de Residencia:</strong>
                                {{ $usuario->direcciones[0]->ciudad }}
                            </div>
                            <div class="form-group">
                                <strong>Estados:</strong>
                                {{ $usuario->estados }}
                            </div>
                            @if ($usuario->datos->isNotEmpty())
                                <div class="form-group">
                                    <strong>Fichas:</strong>
                                    {{ $usuario->datos[0]->ficha_id }}
                                </div>
                            @else
                                <div class="form-group">
                                    <strong>No se encontraron fichas para este usuario.</strong>
                                </div>
                            @endif
                            {{-- @if ($usuario->programa->isNotEmpty())
    <div class="form-group">
        <strong>Fichas:</strong>
        {{ $usuario->programa[0]->progrma_id}}
    </div>
@else
    <div class="form-group">
        <strong>No se encontraron fichas para este usuario.</strong>
    </div>
@endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
