@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Mata Pelajaran</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the mata pelajaran dashboard.</p>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="pb-3">
        <a href="/guru/matapelajaran/create" class="btn btn-success"><span data-feather="plus"></span> Create mata
            pelajaran</a>
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
                            <form action="{{ url('/guru/matapelajaran/' . $nama->id) }}" method="post">
                                @csrf
                                @method('DELETE')
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
