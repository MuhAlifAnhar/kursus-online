@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Materi</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the materi dashboard.</p>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="pb-3">
        <a href="/guru/materi/create" class="btn btn-success"><span data-feather="plus"></span> Create materi</a>
    </div>

    <div class="col-lg-8">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bab</th>
                    <th>Isi Bab</th>
                    <th>Id Quiz</th>
                    <th>Id Mata Pelajaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materi as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama_bab }}</td>
                        <td id="output">{{ $nama->isi_bab }}</td>
                        <td>{{ $nama->id_quiz }}</td>
                        <td>{{ $nama->id_matpel }}</td>
                        <td>
                            <div class="d-flex">
                                <div class="pe-2">
                                    <a href="/guru/materi/create" class="badge bg-success"><span
                                            data-feather="plus"></span></a>
                                </div>
                                <div class="pe-2">
                                    {{-- <a href="{{ url('guru/quiz', $nama->id) }}/edit" class="badge bg-warning"><span
                                            data-feather="edit"></span></a> --}}

                                    <a href="{{ url('guru/materi/' . $nama->id . '/edit') }}" class="badge bg-warning">
                                        <span data-feather="edit"></span>
                                    </a>
                                </div>
                                <div class="pe-2">
                                    <form action="{{ url('/guru/materi/' . $nama->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-danger border-0"
                                            onclick="return  confirm('Kamu yakin mau hapus materi?')">
                                            <span data-feather="x-circle"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
