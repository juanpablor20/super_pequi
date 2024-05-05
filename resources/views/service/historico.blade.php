@extends('tablar::page')

@section('title', 'Historial')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">

                    Servicio
                    <h2 class="page-title">
                        {{ __('historial') }}
                    </h2>
                </div>

                <div class="page-body">
                    <div class="container-xl">
                        @if (config('tablar', 'display_alert'))
                            @include('tablar::common.alert')
                        @endif

                        <div class="row row-deck row-cards">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Servicio</h3>
                                        <div class="card-options col-6">
                                            <a href="#" class="btn btn-danger"><i class="ti ti-file-type-pdf"></i></a>
                                            <a href="#" class="btn btn-success"><i
                                                    class="ti ti-file-type-xls"></i></a>
                                            <a href="#" class="btn btn-info"><i class="ti ti-printer"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom py-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="{{ route('filtro_service') }}" method="GET">
                                                    <div class="mb-3">
                                                        <label for="service_type" class="form-label">Tipo de
                                                            Servicio:</label>
                                                        <select name="service_type" id="service_type"
                                                            class="form-select form-select-sm">
                                                            <option value="">Todos</option>
                                                            <option value="prestamo">Préstamo</option>
                                                            <option value="devolucion">Devolución</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-primary">Buscar</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Buscar servicio" aria-label="Buscar servicio">
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        type="button">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive min-vh-100">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                            type="checkbox" aria-label="Select all invoices"></th>
                                                    <th class="w-1">No. <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-sm text-dark icon-thick" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <polyline points="6 15 12 9 18 15" />
                                                        </svg></th>
                                                    <th>Fecha prestamo</th>
                                                    <th>Fecha Devolucion</th>
                                                    <th>Estado</th>
                                                    <th>Biliotecario que realizo el Servicio</th>
                                                    <th>Numero de Documento</th>
                                                    <th>Numero de Serie</th>

                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($services as $service)
                                                    <tr>
                                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                                aria-label="Select service"></td>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $service->date_ser }}</td>
                                                        <td>{{ $service->return_ser }}</td>
                                                        <td>{{ $service->status }}</td>
                                                        <td>
                                                            @foreach ($librarians as $librarian)
                                                                @if ($librarian->id === $service->librarian_borrower_id)
                                                                    {{ $librarian->names }}
                                                                    {{ $librarian->last_name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $service->Users->number_identification }}</td>
                                                        <td>{{ $service->equipment->serie_equi }}</td>
                                                        <td>
                                                            <div class="btn-list flex-nowrap">
                                                                <div class="dropdown">
                                                                    <div class="btn-list flex-nowrap">
                                                                        <a href="{{ route('mostrarServicio', $service->id) }}"
                                                                            class="btn btn-primary"><i
                                                                                class="ti ti-eye-check"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td colspan="8">No Hay Datos</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        {!! $services->links('tablar::pagination') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
