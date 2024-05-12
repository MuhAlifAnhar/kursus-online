@extends('dashboard.index')

@section('logine')
    <title>Dashboard</title>
@endsection

@section('login')
    <div class="bg-color rounded-bottom-4">
        <div class="container costum-box">
            <h1 class="selamat pt-4">Hi, {{ auth()->user()->nama }}!</h1>
            <p class="datang m-0">Selamat datang di platform belajar online kami, tempat dimana pengetahuan dan pemahaman
                bertemu dengan teknologi untuk menciptakan pengalaman belajar yang menyenangkan dan efektif. Di sini, kami
                menyediakan akses ke berbagai materi pembelajaran yang dikurasi secara cermat, disampaikan melalui
                pengajaran interaktif, dan didukung oleh teknologi terkini. Mulai dari mata pelajaran akademik hingga
                keterampilan praktis, kami berkomitmen untuk mendukung perkembangan Anda dengan cara yang sesuai dan
                menarik. Bergabunglah dengan komunitas belajar kami dan jelajahi ragam sumber daya pendidikan yang dirancang
                untuk membantu Anda meraih kesuksesan di setiap langkah perjalanan pendidikan Anda.</p>
        </div>
        <div class="container sayaa">
            <div class="container saya rounded-4 m-0 p-0">
                <h1 class="selamatt pt-3 pb-3">Para pengajar:</h1>
                <div class="ps-4 d-flex">
                    @foreach ($guru as $data)
                        <a href="{{ url('dashboard/' . $data->nama) }}" class="text-decoration-none pe-5">
                            <div class="card-icon iconee border border-danger rounded-2 mb-3">
                                <div class="icon-header d-flex justify-content-center align-content-center pt-4">
                                    <i class="bi bi-file-person"></i>
                                </div>
                                <div class="icon-body text-center">
                                    <h1 class="kemampuan">{{ $data->nama }}</h1>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="ruangg ps-4">
        <div class="container rounded-4 ruang">
            <h1 class="selamatt pt-3 pb-3">Yang seru di CUS</h1>
            <div id="carouselExampleAutoplaying" class=" container carousel slide carousel-fade pb-5"
                data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://roboguru-forum-cdn.ruangguru.com/image/2a47c4c4-f918-4317-8cd5-98917f1b18ab.png?convert=webp&height=199.5"
                            class="gambar pe-3" alt="...">
                        <img src="https://roboguru-forum-cdn.ruangguru.com/image/69a2600b-4cd6-4f7f-a297-a7582d1037b2.png?convert=webp&height=199.5"
                            class="gambar pe-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://roboguru-forum-cdn.ruangguru.com/image/61992562-c4b5-492d-9228-21884333ada8.png?convert=webp&height=199.5"
                            class="gambar pe-3" alt="...">
                        <img src="https://roboguru-forum-cdn.ruangguru.com/image/1ba5225e-8120-41ec-a228-500cf07adcea.jpg?convert=webp&height=199.5"
                            class="gambar pe-3" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="container belajarrr">
        <h1 class="selama pt-4">Mau belajar apa hari ini?</h1>
    </div>
    <div class="bg-blue pt-5 pb-3">
        <h1 class="container pelajaran text-center pb-3">Mata Pelajaran yang Kami Berikan:</h1>
        <div class="row m-0 p-0">
            <div class="col-4 m-0 p-0">
                <a href="#" class="text-decoration-none d-flex justify-content-end align-content-center mt-5 mb-5">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-2">
                            <i class="bi bi-translate"></i>
                        </div>
                        <div class="icon-body text-center m-0 p-0">
                            <h1 class="kemampuan m-0 p-0">Bahasa Indonesia</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none d-flex justify-content-end align-content-center mb-5">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-right"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-2">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <div class="icon-body text-center m-0 p-0">
                            <h1 class="kemampuan m-0 p-0">Matematika</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none d-flex justify-content-end align-content-center m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-right"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-4 pb-1">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="icon-body text-center m-0 p-0">
                            <h1 class="kemampuan m-0 p-0">Ips</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center align-content-center p-0 m-0" data-aos="flip-up"
                data-aos-anchor-placement="center-bottom">
                <i class="bi bi-book bii justify-content-center align-content-center p-0 m-0"></i>
            </div>
            <div class="col-4 m-0 p-0">
                <a href="#" class="text-decoration-none m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 mt-5 mb-5" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-2">
                            <i class="bi bi-translate"></i>
                        </div>
                        <div class="icon-body text-center">
                            <h1 class="kemampuan">Bahasa Inggris</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 mb-5" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-4 pb-1">
                            <i class="fas fa-flask"></i>
                        </div>
                        <div class="icon-body text-center">
                            <h1 class="kemampuan">Ipa</h1>
                        </div>
                    </div>
                </a>
                <a href="#" class="text-decoration-none m-0 p-0">
                    <div class="card-icon icone border border-danger rounded-2 m-0 p-0" data-aos="flip-left"
                        data-aos-anchor-placement="center-bottom">
                        <div class="icon-header d-flex justify-content-center align-content-center pt-4 pb-1">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="icon-body text-center">
                            <h1 class="kemampuan">Penalaran Umum</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
