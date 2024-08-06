@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Create Materi</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the create materi dashboard.</p>

    <div class="col-lg-8">
        <form method="post" action="/guru/materi">
            @csrf
            <div class="form-group mb-3">
                <label for="nama_bab">Nama Bab</label>
                <input type="text" name="nama_bab" class="form-control @error('nama_bab') is-invalid @enderror"
                    id="nama_bab" required autofocus value="{{ old('nama_bab') }}">
                @error('nama_bab')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="isi_bab">Isi Bab</label>
                <input id="x" type="hidden" name="isi_bab"
                    class="form-control @error('isi_bab') is-invalid @enderror" id="isi_bab" rows="5" required
                    value="{{ old('isi_bab') }}">
                <trix-editor input="x"></trix-editor>
                @error('isi_bab')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="id_quiz">Quiz</label>
                <select name="id_quiz" class="form-control @error('id_quiz') is-invalid @enderror" id="id_quiz" required
                    value="{{ old('id_quiz') }}">
                    @error('id_quiz')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($quizzes as $quiz)
                        <option value="{{ $quiz->id }}">{{ $quiz->soal_1 }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="id_matpel">Mata Pelajaran</label>
                <select name="id_matpel" class="form-control @error('id_matpel') is-invalid @enderror" id="id_matpel"
                    required value="{{ old('id_matpel') }}">
                    @error('id_matpel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($matpels as $matpel)
                        <option value="{{ $matpel->id }}">{{ $matpel->nama_matpel }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Matpel</button>
        </form>
    </div>
@endsection
