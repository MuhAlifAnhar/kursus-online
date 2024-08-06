@extends('dashboard.index')

@section('logine')
    <title>Kuis</title>
@endsection

@section('login')
    <div class="container pb-5" id="quiz">
        <h1>Kuis</h1>
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
        @endif
        <form action="{{ url('/hasil') }}" method="POST">
            @csrf
            <input type="hidden" name="quiz_id" value="{{ $quiz->first()->id }}">
            @foreach ($quiz as $q)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kuis ID: {{ $q->id }}</h5>
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="mb-3">
                                <label for="soal{{ $i }}" class="form-label">{{ $q->{'soal_' . $i} }}</label>
                                <div>
                                    @foreach (['a', 'b', 'c', 'd'] as $option)
                                        <input type="radio" name="pilihan_{{ $i }}"
                                            value="{{ $option }}">
                                        {{ $q->{'pilihan_' . $i . $option} }}<br>
                                    @endforeach
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
