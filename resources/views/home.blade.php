@extends('tablar::page')

@section('title')
    home
@endsection
@section('content')
   
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        panel Principal
                        @can('bibliotecatio')
                            ...juan pablo
                        @endcan
                    </div>
                    <h2 class="page-title">
                        @role('bibliotecario')
                            <h2>esto solo se muestra al bibliotecario</h2>
                        @endrole
                        @role('coordinador')
                            <h1>esto es para juan</h1>
                        @endrole
                        Pequi
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
                            <h3 class="card-title">Invoices</h3>
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

                                        <th>Fecha de Prestamo</th>
                                        <th>Numero de Documento</th>
                                        <th>Numero de Serie</th>
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
                                            <td>{{ $service->Users->number_identification }}</td>
                                            <td>{{ $service->equipment->serie_equi }}</td>

                                            <td>
                                                @if ($service->state_ser == 'prestado')
                                                    <span class="badge bg-warning text-dark me-1"></span> pendiente
                                                @elseif ($service->state_ser == 'devuelto')
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

                                        @if (session('error'))
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>
                                            // Muestra el mensaje de error utilizando SweetAlert2
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '{{ session('error') }}',
                                                confirmButtonText: 'Aceptar'
                                            });
                                        </script>
                                    @endif
                                    
                                    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        // Envía una solicitud AJAX al controlador
                                        function enviarSolicitud(event) {
                                            event.preventDefault(); // Evita el comportamiento predeterminado del formulario
                                    
                                            $.ajax({
                                                type: 'POST',
                                                url: '{{ route('prestamos') }}',
                                                data: {
                                                    // Tu data aquí si es necesario
                                                },
                                                success: function(response) {
                                                    // Si hay un error, muestra el mensaje utilizando SweetAlert2
                                                    if (response.error) {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: response.error,
                                                            confirmButtonText: 'Aceptar'
                                                        });
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    // Si ocurre un error en la solicitud AJAX, muestra un mensaje genérico de error
                                                    console.error(error);
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: '¡Ocurrió un error al procesar la solicitud!',
                                                        confirmButtonText: 'Aceptar'
                                                    });
                                                }
                                            });
                                        }
                                    
                                        // Asigna la función a la acción de enviar el formulario
                                        $(document).ready(function() {
                                            $('#prestamo').submit(enviarSolicitud);
                                        });
                                    </script> --}}
                                    
                                    
                                
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

                                    @empty
                                        <td colspan="9">No Hay Datos</td>
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

