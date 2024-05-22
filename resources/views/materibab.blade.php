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
                    <th>Nama Mata Pelajaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matpel as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama_matpel }}</td>
                        <td>
                            {{-- <a href="/guru/matapelajaran/create" class="badge bg-success"><span data-feather="plus"></span></a> --}}
                            {{-- <a href="" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                            <form action="/guru/matapelajaran/posts" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return  confirm('Kamu yakin mau hapus mata pelajaran?')">
                                    <span data-feather="x-circle"></span> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
