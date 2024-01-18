@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home page</div>

                <div class="card-body">
                    @if (session('user'))
                    {{-- Пользователь вошел в систему --}}
                    <h2><a class="btn btn-danger" href="{{ route('auth.logout') }}">Logout</a></h2>
                    <h2><a class="btn btn-primary" href="{{ route('employee.index') }}">Employees</a></h2>
                    @if (session('user')['is_admin'])
                    {{-- Пользователь - админ --}}
                    <h2><a class="btn btn-primary" href="{{ route('admin.index') }}">Admin</a></h2>
                    @else
                    {{-- Пользователь, но не админ --}}
                    <p>Welcome! You are logged in as a regular user.</p>
                    @endif
                    @else
                    {{-- Пользователь не вошел в систему --}}
                    <h2><a class="btn btn-success" href="{{ route('auth.showRegistrationForm') }}">Register</a></h2>
                    <h2><a class="btn btn-primary" href="{{ route('auth.showLoginForm') }}">Login</a></h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
