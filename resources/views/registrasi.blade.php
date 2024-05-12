@extends('login.index')

@section('logine')
    <title>CUS | Registrasi</title>
@endsection

@section('login')
    <div class="card">
        <div class="card-header">
            CUS - Registrasi
        </div>
        <div class="card-body">
            <form id="loginForm" method="post" action="/registrasi">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Masukkan Nama</label>
                    <input type="text" class="form-control @error('nama')is-invalid @enderror" value="{{ old('nama') }}"
                        required id="nama" placeholder="Nama" name="nama">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <input type="password" class="form-control @error('password')is-invalid @enderror" required
                        id="password" placeholder="Password" name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                        name="role">
                        <option value="1">User</option>
                        <option value="2">Pengajar</option>
                    </select>
                    <label for="floatingSelect">Pilih level anda</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </form>
        </div>
        <div>
            <small class="d-block text-center text-bold mb-2">
                Already registered?
                <a href="/">
                    Login!
                </a>
            </small>
        </div>
    </div>
@endsection
