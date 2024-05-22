@extends('dashboard.index')

@section('logine')
    <title>Materi</title>
@endsection

@section('login')
    <div class="bg-color rounded-bottom-4">
        <div class="container costum-box">
            <h1 class="selamat pt-4">Hi, {{ auth()->user()->nama }}!</h1>
            <p class="datanga m-0">Terima kasih telah memilih pengajar! Sekarang, Anda dapat melanjutkan perjalanan belajar
                Anda dengan memilih mata pelajaran yang ingin Anda pelajari selanjutnya.</p>
        </div>
        <div class="container sayaa">
            <div class="container say rounded-4 m-0 p-0">
                <h1 class="selamatt pt-3 pb-3">Mata pelajaran:</h1>
                <div class="ps-4 d-flex">
                    @if ($pemateri->count())
                        @foreach ($pemateri as $data)
                            <a href="{{ url('dashboard/' . $data->nama . '/' . $data->nama_matpel) }}"
                                class="text-decoration-none pe-5">
                                <div class="card-icon iconee border border-danger rounded-2 mb-3">
                                    <div class="icon-header d-flex justify-content-center align-content-center pt-4">
                                        <i class="bi bi-file-earmark-text biii"></i>
                                    </div>
                                    <div class="icon-body text-center">
                                        <h1 class="kemampuan">{{ $data->nama_matpel }}</h1>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="text-center belum fs-4">Belum Ada Mata Pelajaran</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container belajar">
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
@endsection
