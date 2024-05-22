@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Create Mata Pelajaran</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the create mata pelajaran dashboard.</p>

    <div class="col-lg-8">
        <form method="post" action="/guru/matapelajaran">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama mata pelajaran</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-floating mb-3">
                <select class="form-select" id="matpel">
                    <option selected>Pilih </option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">Create Matpel</button>
        </form>
    </div>
@endsection
