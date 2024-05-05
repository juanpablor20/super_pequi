@extends('tablar::page')

@section('title', 'View User')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('usuario') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Lista de Usuarios
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
                            <h3 class="card-title">Detalles del usuario</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Nombres:</strong>
                                {{ $user->names }}
                            </div>
                            <div class="form-group">
                                <strong>Apellidos:</strong>
                                {{ $user->last_name }}
                            </div>
                            <div class="form-group">
                                <strong>Tipo de Identificacion:</strong>
                                {{ $user->type_identification }}
                            </div>
                            <div class="form-group">
                                <strong>Nummero de Identificacion:</strong>
                                {{ $user->number_identification }}
                            </div>
                            <div class="form-group">
                                <strong>Sexo:</strong>
                                {{ $user->sex_user }}
                            </div>
                            <div class="form-group">
                                <strong>Genero:</strong>
                                {{ $user->gender_sex }}
                            </div>
                            <div class="form-group">
                                <strong>Correo</strong>
                                {{ $user->contacts->email_con }}
                            </div>
                            <div class="form-group">
                                <strong>Telefono</strong>
                                {{ $user->contacts->telephone_con }}
                            </div>
                            <div class="form-group">
                                <strong>Dirección</strong>
                                {{ $user->address->addres_add }}
                            </div>
                            <div class="form-group">
                                <strong>estado:</strong>
                                {{ $user->states }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <h2>Préstamos del usuario</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha de prestamo</th>
                                        <th>Fecha de Devolucion</th>
                                        <th>Equipo</th>
                                        <th>Numero de Serie</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prestamos as $prestamo)
                                        <tr>
                                            <td>{{ $prestamo->date_ser }}</td>
                                            <td>{{ $prestamo->return_ser}}</td>
                                            <td>{{ $prestamo->equipment->type_equi }}</td>
                                            <td>{{ $prestamo->equipment->serie_equi }}</td>
                                            <td>{{ $prestamo->status }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">No hay préstamos para este usuario.</td>
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
