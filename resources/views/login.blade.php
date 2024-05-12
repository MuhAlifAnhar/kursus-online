@extends('login.index')

@section('logine')
    <title>CUS | Login</title>
@endsection

@section('login')
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header">
            CUS - Login
        </div>
        <div class="card-body">
            <form id="loginForm" method="post" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Masukkan Email</label>
                    <input type="email" class="form-control @error('email')is-invalid @enderror"
                        value="{{ old('email') }}" required id="email" placeholder="Email" name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Masukkan Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </form>
        </div>
        <div>
            <small class="d-block text-center text-bold mb-2">
                Not registered?
                <a href="/registrasi">
                    Registrasi Now!
                </a>
            </small>
        </div>
    </div>
@endsection
