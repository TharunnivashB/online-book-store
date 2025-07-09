{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <br>
        {{-- Card --}}
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <h4 class="mb-4 text-center">Create an Account</h4>

                {{-- Validation Errors --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Registration Form --}}
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
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

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            required
                            class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Register Button --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="small text-decoration-none">
                            Already registered?
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-1"></i> Register
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection