@extends('tablar::page')

@section('title', 'View User')

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
                        {{ __('User ') }}
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
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            User List
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
                            <h3 class="card-title">User Details</h3>
                        </div>
                        <div class="card-body">
                            
<div class="form-group">
<strong>Names:</strong>
{{ $user->names }}
</div>
<div class="form-group">
<strong>Last Name:</strong>
{{ $user->last_name }}
</div>
<div class="form-group">
<strong>Type Identification:</strong>
{{ $user->type_identification }}
</div>
<div class="form-group">
<strong>Number Identification:</strong>
{{ $user->number_identification }}
</div>
<div class="form-group">
<strong>Sex User:</strong>
{{ $user->sex_user }}
</div>
<div class="form-group">
<strong>Gender Sex:</strong>
{{ $user->gender_sex }}
</div>
<div class="form-group">
<strong>States:</strong>
{{ $user->states }}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

