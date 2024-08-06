@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Quiz</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the quiz dashboard.</p>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="pb-3">
        <a href="/guru/quiz/create" class="btn btn-success"><span data-feather="plus"></span> Create quiz</a>
    </div>

    <div class="col-lg-8 overflow-auto ">
        <table id="myTable" class="display ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soal 1</th>
                    <th>Pilihan 1a</th>
                    <th>Pilihan 1b</th>
                    <th>Pilihan 1c</th>
                    <th>Pilihan 1d</th>
                    <th>Jawaban 1</th>
                    <th>Soal 2</th>
                    <th>Pilihan 2a</th>
                    <th>Pilihan 2b</th>
                    <th>Pilihan 2c</th>
                    <th>Pilihan 2d</th>
                    <th>Jawaban 2</th>
                    <th>Soal 3</th>
                    <th>Pilihan 3a</th>
                    <th>Pilihan 3b</th>
                    <th>Pilihan 3c</th>
                    <th>Pilihan 3d</th>
                    <th>Jawaban 3</th>
                    <th>Soal 4</th>
                    <th>Pilihan 4a</th>
                    <th>Pilihan 4b</th>
                    <th>Pilihan 4c</th>
                    <th>Pilihan 4d</th>
                    <th>Jawaban 4</th>
                    <th>Soal 5</th>
                    <th>Pilihan 5a</th>
                    <th>Pilihan 5b</th>
                    <th>Pilihan 5c</th>
                    <th>Pilihan 5d</th>
                    <th>Jawaban 5</th>
                    {{-- <th>Soal 6</th>
                    <th>Pilihan 6</th>
                    <th>Jawaban 6</th>
                    <th>Soal 7</th>
                    <th>Pilihan 7</th>
                    <th>Jawaban 7</th>
                    <th>Soal 8</th>
                    <th>Pilihan 8</th>
                    <th>Jawaban 8</th>
                    <th>Soal 9</th>
                    <th>Pilihan 9</th>
                    <th>Jawaban 9</th>
                    <th>Soal 10</th>
                    <th>Pilihan 10</th>
                    <th>Jawaban 10</th> --}}
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->soal_1 }}</td>
                        <td>{{ $nama->pilihan_1a }}</td>
                        <td>{{ $nama->pilihan_1b }}</td>
                        <td>{{ $nama->pilihan_1c }}</td>
                        <td>{{ $nama->pilihan_1d }}</td>
                        <td>{{ $nama->jawaban_1 }}</td>
                        <td>{{ $nama->soal_2 }}</td>
                        <td>{{ $nama->pilihan_2a }}</td>
                        <td>{{ $nama->pilihan_2b }}</td>
                        <td>{{ $nama->pilihan_2c }}</td>
                        <td>{{ $nama->pilihan_2d }}</td>
                        <td>{{ $nama->jawaban_2 }}</td>
                        <td>{{ $nama->soal_3 }}</td>
                        <td>{{ $nama->pilihan_3a }}</td>
                        <td>{{ $nama->pilihan_3b }}</td>
                        <td>{{ $nama->pilihan_3c }}</td>
                        <td>{{ $nama->pilihan_3d }}</td>
                        <td>{{ $nama->jawaban_3 }}</td>
                        <td>{{ $nama->soal_4 }}</td>
                        <td>{{ $nama->pilihan_4a }}</td>
                        <td>{{ $nama->pilihan_4b }}</td>
                        <td>{{ $nama->pilihan_4c }}</td>
                        <td>{{ $nama->pilihan_4d }}</td>
                        <td>{{ $nama->jawaban_4 }}</td>
                        <td>{{ $nama->soal_5 }}</td>
                        <td>{{ $nama->pilihan_5a }}</td>
                        <td>{{ $nama->pilihan_5b }}</td>
                        <td>{{ $nama->pilihan_5c }}</td>
                        <td>{{ $nama->pilihan_5d }}</td>
                        <td>{{ $nama->jawaban_5 }}</td>
                        {{-- <td>{{ $nama->soal_6 }}</td>
                        <td>{{ $nama->pilihan_6 }}</td>
                        <td>{{ $nama->jawaban_6 }}</td>
                        <td>{{ $nama->soal_7 }}</td>
                        <td>{{ $nama->pilihan_7 }}</td>
                        <td>{{ $nama->jawaban_7 }}</td>
                        <td>{{ $nama->soal_8 }}</td>
                        <td>{{ $nama->pilihan_8 }}</td>
                        <td>{{ $nama->jawaban_8 }}</td>
                        <td>{{ $nama->soal_9 }}</td>
                        <td>{{ $nama->pilihan_9 }}</td>
                        <td>{{ $nama->jawaban_9 }}</td>
                        <td>{{ $nama->soal_10 }}</td>
                        <td>{{ $nama->pilihan_10 }}</td>
                        <td>{{ $nama->jawaban_10 }}</td> --}}
                        <td>
                            <div class="d-flex">
                                <div class="pe-2">
                                    <a href="/guru/quiz/create" class="badge bg-success"><span
                                            data-feather="plus"></span></a>
                                </div>
                                <div class="pe-2">
                                    {{-- <a href="{{ url('guru/quiz', $nama->id) }}/edit" class="badge bg-warning"><span
                                            data-feather="edit"></span></a> --}}

                                    <a href="{{ url('guru/quiz/' . $nama->id . '/edit') }}" class="badge bg-warning">
                                        <span data-feather="edit"></span>
                                    </a>
                                </div>
                                <div class="pe-2">
                                    <form action="{{ url('/guru/quiz/' . $nama->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-danger border-0"
                                            onclick="return  confirm('Kamu yakin mau hapus quiz?')">
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
