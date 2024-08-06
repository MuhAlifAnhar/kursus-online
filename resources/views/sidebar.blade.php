@extends('dashboard.index')

@section('logine')
    <title>Materi</title>
@endsection

@section('login')
    <div class="container">
        <div class="row">
            <!-- Sidebar untuk memilih materi -->
            <div class="col-md-2 p-5">
                <div class="list-group">
                    <p><strong>Daftar Materi :</strong></p>
                    {{-- <form action="/update-progress" method="post"> --}}
                    @foreach ($materi as $material)
                        <form
                            action="{{ url('dashboard/' . $dosen . '/' . $matpel->nama_matpel . '/' . $material->nama_bab) }}"
                            method="get">
                            @csrf
                            <input type="hidden" name="materi" value="{{ $material->id }}">
                            <div class="pb-2">
                                <button type="submit"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    {{ $material->nama_bab }}
                                    @if ($completedMaterii->pluck('id_materi')->contains($material->id))
                                        <i class="bi bi-check-circle-fill text-success ms-2 ceklis"></i>
                                    @endif
                                </button>
                            </div>
                        </form>
                        @if ($loop->first)
                            <a href="{{ url('dashboard/quiz/' . $dosen . '/' . $matpel->nama_matpel) }}"
                                class="text-decoration-none pe-5">
                                <div class="icon-body text-center pt-3">
                                    <h1 class="kemampuan text-dark">Quiz</h1>
                                </div>
                            </a>
                        @endif
                    @endforeach
                    {{-- </form> --}}
                </div>
            </div>
            <!-- Konten utama untuk menampilkan materi dan kuis -->
            <div class="col-md-10">
                @if ($selectedMateri)
                    <div class="card mb-3" id="materi-{{ $selectedMateri->id }}">
                        <div class="card-body">
                            <h5 class="card-title pt-1">{{ $selectedMateri->nama_bab }}</h5>
                            <p class="card-text">{!! $selectedMateri->isi_bab !!}</p>
                        </div>
                    </div>
                @else
                    <p>Silakan pilih materi dari daftar di samping.</p>
                @endif
            </div>
        </div>
        <div class="text-center mt-4">
            @if ($selectedMateri)
                @php
                    $nextMateriIndex = $materi->search($selectedMateri) + 1;
                    $nextMateri = $materi->get($nextMateriIndex);
                @endphp
                @if ($nextMateri)
                    <form
                        action="{{ url('dashboard/' . $dosen . '/' . $matpel->nama_matpel . '/' . $nextMateri->nama_bab) }}"
                        method="get">
                        @csrf
                        <div class="pb-2">
                            <button type="submit" class="btn btn-primary">
                                Materi Selanjutnya
                            </button>
                        </div>
                    </form>
                @else
                    <p>Anda telah menyelesaikan semua materi, silahkan pilih quiz di sidebar sebelah kiri atas.</p>
                @endif
            @endif
        </div>
        <div class="container progres">
            <h2 class="selamat">Progres Belajar Anda:</h2>
            <div class="progress">
                <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p id="progressText" class="text-center text-bold mt-2">0% selesai</p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const totalMateri = {{ $materi->count() }}; // Termasuk kuis
            const materiSelesai = {{ $completedMateri }};
            const progressPercentage = (materiSelesai / totalMateri) * 100;

            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            progressBar.style.width = progressPercentage + '%';
            progressBar.setAttribute('aria-valuenow', progressPercentage);
            progressText.innerText = progressPercentage.toFixed(0) + '% selesai';
        });
    </script>
@endsection
