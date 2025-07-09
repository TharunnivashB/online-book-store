{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <br> {{-- Card --}}
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <h4 class="mb-4 text-center">Sign in to BookStore</h4>

                {{-- Session Status --}}
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                {{-- Login Form --}}
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                            id="password"
                            name="password"
                            required
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="form-check mb-3">
                        <input class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember_me">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    {{-- Forgot / Submit --}}
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                        <a class="small text-decoration-none" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-1"></i> Log in
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection