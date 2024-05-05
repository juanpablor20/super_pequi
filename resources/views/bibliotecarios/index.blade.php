@extends('tablar::page')

@section('title')
    bibliotecarios
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->

                    <h2 class="page-title">
                        {{ __('bibliotecarios') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('bibliotecarios.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear bibliotrcario
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">bibliotecarios</h3>
                            <div class="card-options col-6">
                                <a href="#" class="btn btn-danger"><i class="ti ti-file-type-pdf"></i></a>
                                <a href="#" class="btn btn-success"><i class="ti ti-file-type-xls"></i></a>
                                <a href="#" class="btn btn-info"><i class="ti ti-printer"></i></a>
                            </div>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="10" size="3"
                                               aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                               aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive min-vh-100">
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
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <polyline points="6 15 12 9 18 15"/>
                                        </svg>
                                    </th>
                                    
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Num Doc</th>
										<th>Estados</th>

                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($bibliotecarios as $usuario)
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select usuario"></td>
                                        <td>{{ ++$i }}</td>
                                        
											<td>{{ $usuario->names }}</td>
											<td>{{ $usuario->last_name }}</td>
											<td>{{ $usuario->number_identification }}</td>

                                            
                                            <td>
                                                @if($usuario->states == 'active')
                                                    <span class="badge bg-success me-1"></span> Activo
                                                @elseif($usuario->states == 'with_equipment')
                                                    <span class="badge bg-warning text-dark me-1"></span> con_equipo
                                                @elseif($usuario->states == 'inactive')
                                                    
                                                    <span class="badge bg-danger me-1"></span> Inactivo
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('bibliotecarios.show',$usuario->id) }}" class="btn btn-primary"><i class="ti ti-eye-check"></i></a>
                                                    <a href="{{ route('bibliotecarios.edit',$usuario->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
                                                    <form action="{{ route('bibliotecarios.destroy',$usuario->id) }}" method="POST" onsubmit="return confirm('Estás seguro de que quieres inactivar este usuario?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="ti ti-trash-off"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                    </tr>
                                @empty
                                    <td>No Data Found</td>
                                @endforelse
                                </tbody> 

                            </table>
                        </div>
                       <div class="card-footer d-flex align-items-center">
                            {!! $bibliotecarios->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
