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
    <x-tabulator :table="$table"  />

    
  
@endsection
