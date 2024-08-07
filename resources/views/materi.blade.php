@extends('dashboard.index')

@section('logine')
    <title>List Materi</title>
@endsection

@section('login')
    <div class="bg-color rounded-bottom-4">
        <div class="container costum-box">
            @if (session('isPassed') !== null)
                @if (session('isPassed'))
                    <div class="alert alert-success" role="alert">
                        Selamat, Anda lulus dengan skor {{ session('score') }}%.
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        Maaf, Anda tidak lulus. Skor Anda {{ session('score') }}%.
                    </div>
                @endif
            @else
                <h1 class="selamat pt-4">Hi, {{ auth()->user()->nama }}!</h1>
                <p class="datanga m-0">Terima kasih telah memilih mata pelajaran! Sekarang, Anda dapat melanjutkan perjalanan
                    belajar
                    Anda dengan memilih materi yang ingin Anda pelajari selanjutnya.</p>
            @endif
        </div>

        <div class="container sayaa">
            <div class="container say rounded-4 m-0 p-0">
                <h1 class="selamatt pt-3 pb-3">Materi:</h1>
                <div class="ps-4 d-flex flex-wrap">
                    @if ($datu->count())
                        @foreach ($datu as $data)
                            <a href="{{ url('dashboard/' . $data->nama_guru . '/' . $data->nama_matpel . '/' . $data->nama_bab . '?selectedMateriId=' . $data->id) }}"
                                class="text-decoration-none pe-5 d-block">
                                <div class="card-icon iconee border border-danger rounded-2 mb-3">
                                    {{-- <div class="icon-header d-flex justify-content-center align-content-center pt-4">
                                            <i class="bi bi-file-earmark-text biii"></i>
                                        </div> --}}
                                    <div class="icon-body text-center pt-3">
                                        <h1 class="kemampuan">{{ $data->nama_bab }}</h1>
                                    </div>
                                </div>
                            </a>
                            @if ($loop->first)
                                <a href="{{ url('dashboard/quiz/' . $data->nama_guru . '/' . $data->nama_matpel) }}"
                                    class="text-decoration-none pe-5 d-block">
                                    <div class="card-icon iconee border border-danger rounded-2 mb-3">
                                        {{-- <div class="icon-header d-flex justify-content-center align-content-center pt-4">
                                                <i class="bi bi-file-earmark-text biii"></i>
                                            </div> --}}
                                        <div class="icon-body text-center pt-3">
                                            <h1 class="kemampuan">Quiz</h1>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @else
                        <p class="text-center belum fs-4">Belum Ada Materi</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- Progress Section -->
        <div class="container progres">
            <h2 class="selamat">Progres Belajar Anda:</h2>
            <div class="progress">
                <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p id="progressText" class="text-center text-bold mt-2">0% selesai</p>
        </div>
    </div>
    <div class="container belaja">
        <h1 class="selama pt-5">Kenapa harus belajar di sini?</h1>
    </div>
    <div class="bg-blue pt-5 pb-3">
        <h1 class="container pelajaran text-center pb-3">6 Alasan Kenapa Harus Belajar di Sini:</h1>
        <div class="row m-0 p-0">
            <div class="col-4 m-0 p-0">
                <a href="#" class="text-decoration-none d-flex justify-content-end align-content-center mt-5 mb-5">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-3 pb-1">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="icon-body text-center m-0 p-0">
                            <h1 class="kemampuan m-0 p-0">Kurasi Materi Berkualitas</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none d-flex justify-content-end align-content-center mb-5">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-right"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-2">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <div class="icon-body text-center m-0 p-0">
                            <h1 class="kemampuan m-0 p-0">Pengalaman Belajar Interaktif</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none d-flex justify-content-end align-content-center m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-right"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-3 pb-1">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="icon-body text-center m-0 p-0">
                            <h1 class="kemampuan m-0 p-0">Dukungan dari Pengajar Ahli</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center align-content-center p-0 m-0" data-aos="flip-up"
                data-aos-anchor-placement="center-bottom">
                <i class="bi bi-check-circle-fill bii justify-content-center align-content-center p-0 m-0"></i>
            </div>
            <div class="col-4 m-0 p-0">
                <a href="#" class="text-decoration-none m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 mt-5 mb-5" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-2">
                            <i class="bi bi-calendar3"></i>
                        </div>
                        <div class="icon-body text-center">
                            <h1 class="kemampuan">Fleksibilitas Belajar</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 mb-5" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-1">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="icon-body text-center">
                            <h1 class="kemampuan">Komunitas Belajar yang Solid</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-3 pb-1">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="icon-body text-center">
                            <h1 class="kemampuan">Pembaruan Materi Terus-menerus</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const totalMateri = {{ $datu->count() }} + 1; // Termasuk kuis
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
