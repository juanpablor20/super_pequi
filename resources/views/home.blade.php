@extends('tablar::page')

@section('title')
    home
@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header d-print-none">

       

        @if (config('tablar', 'display_alert'))
            @include('tablar::common.alert')
        @endif
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Panel Principal
                        @can('bibliotecatio')
                            ...juan pablo
                        @endcan
                    </div>
                    <h2 class="page-title">
                        @role('bibliotecario')
                            <h2>Esto solo se muestra al bibliotecario</h2>
                        @endrole
                        @role('cordinador')
                            <h1>Esto es para juan</h1>
                        @endrole
                        Pequi
                    </h2>
                     
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#prestamo">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Registrar Prestamo
                        </a>
                        <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#devolucion">
                            <!-- Icono "Menos" SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Registrar Devolucion

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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Servicio</h3>

                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">

                                <div class="ms-auto text-muted">
                                    Buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select all invoices"></th>
                                        <th class="w-1">No.
                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="6 15 12 9 18 15" />
                                            </svg>
                                        </th>
                                        @role('cordinador')
                                            <th>esto solo se muestraa al cordinador</th>
                                        @endrole
                                        @role('bibliotecario')
                                            <th>esto solo se muestra al bibliotecario</th>
                                        @endrole
                                        @role('cordinador')
    <!-- Contenido específico para coordinadores -->
    <p>Bienvenido, coordinador. Este contenido solo se muestra a los coordinadores.</p>
@endrole

@role('bibliotecario')
    <!-- Contenido específico para bibliotecarios -->
    <p>Bienvenido, bibliotecario. Este contenido solo se muestra a los bibliotecarios.</p>
@endrole


                                        <th>Fecha de Prestamo</th>
                                        @foreach ($user as $hola)
                                        {{ $hola->name }}
                                    @endforeach
                                        <th>Nombre</th>
                                        <th>Roll</th>
                                        <th>Tipo de Equipo</th>
                                        <th>Numero de Serie</th>
                                        <th>Lugar de Traslado</th>
                                        <th>Estado</th>
                                       
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($services as $service)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select service"></td>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $service->date_ser }}</td>
                                            <td>
                                                @if ($service->Users)
                                                    {{ $service->Users->names }}
                                                @else
                                                    Usuario no encontrado
                                                @endif
                                            </td>
                                            <td>
                                                @if ($service->Users && $service->Users->roles->isNotEmpty())
                                                    @foreach ($service->Users->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                @else
                                                    Sin rol asignado
                                                @endif
                                            </td>
                                            <td>{{ $service->equipment->type_equi }}</td>
                                            <td>{{ $service->equipment->serie_equi }}</td>
                                            <td>{{ $service->environment->names }}</td>
                                           
                                            <td>
                                                @if ($service->status == 'pendiente')
                                                    <span class="badge bg-warning text-dark me-1"></span> pendiente
                                                @elseif ($service->status == 'devuelto')
                                                    <span class="badge bg-secundary me-1"></span>devuelto
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('mostrarServicio', $service->id) }}"
                                                        class="btn btn-primary"><i class="ti ti-eye-check"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">No Hay Datos</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
@endsection
