@extends('tablar::page')

@section('title')
    Programas
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    
                    <h2 class="page-title">
                        {{ __('Programas') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('programs.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear programa
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
                            <h3 class="card-title">Programa</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                              
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
                                    
										<th>Nombre del Programa</th>
										<th>Codigo</th>
										<th>Version</th>
										<th>Estado</th>

                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($programs as $program)
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select program"></td>
                                        <td>{{ ++$i }}</td>
                                        
											<td>{{ $program->names_pro }}</td>
											<td>{{ $program->code_pro }}</td>
											<td>{{ $program->version }}</td>
											<td>{{ $program->states }}</td>

                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="btn-list flex-nowrap">
                                                     <a href="{{ route('programs.edit',$program->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
                                                    <form action="{{ route('programs.destroy',$program->id) }}" method="POST" onsubmit="return confirm('Estás seguro de que quieres inactivar este programa?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                        class="btn btn-danger">
                                                        <i class="ti ti-trash-off">
                                                            </i></button>
                                                    </form>
                                                </div>
                                                {{-- <div class="dropdown">
                                                   
                                                    
                                                        <a class="dropdown-item"
                                                           href="{{ route('programs.edit',$program->id) }}">
                                                            Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('programs.destroy',$program->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                                    class="dropdown-item text-red"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                   
                                                </div> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>No hay datos</td>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                       <div class="card-footer d-flex align-items-center">
                            {!! $programs->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
