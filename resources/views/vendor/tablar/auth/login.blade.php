@extends('tablar::auth.layout')
@section('title', 'Login')
@section('content')
    <div class="container container-tight py-4">

        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset(config('tablar.auth_logo.img.path', 'assets/logo.svg')) }}" height="100"
                    alt="450"></a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Iniciar Sesión</h2>
                <form action="{{ route('login') }}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">USUARIO</label>
                        <input type="number" class="form-control @error('users') is-invalid @enderror" name="users"
                            placeholder="Username" autocomplete="off">
                        @error('users')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </span>
                    <label class="form-label">CONTRASEÑA</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password"
                                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{route('password.request')}}">olvidé la contraseña</a>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
            </form>
        </div>
    </div>
@endsection
