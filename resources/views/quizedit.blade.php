@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Edit Quiz</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the Edit quiz dashboard.</p>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div class="col-lg-8">
        <form method="post" action="{{ url('guru/quiz/' . $quiz->id) }}">
            @method('put')
            @csrf
            <div id="soal-container">
                <div class="mb-3">
                    <label for="nama_1" class="form-label">Soal 1</label>
                    <input type="text" name="nama_1" class="form-control @error('nama_1') is-invalid @enderror"
                        id="nama_1" required autofocus value="{{ old('nama_1', $quiz->soal_1) }}">
                    @error('nama_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_1a" class="form-label">Pilihan a</label>
                    <input type="text" name="pilihan_1a" class="form-control @error('pilihan_1a') is-invalid @enderror"
                        id="pilihan_1a" required value="{{ old('pilihan_1a', $quiz->pilihan_1a) }}">
                    @error('pilihan_1a')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_1b" class="form-label">Pilihan b</label>
                    <input type="text" name="pilihan_1b" class="form-control @error('pilihan_1b') is-invalid @enderror"
                        id="pilihan_1b" required value="{{ old('pilihan_1b', $quiz->pilihan_1b) }}">
                    @error('pilihan_1b')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_1c" class="form-label">Pilihan c</label>
                    <input type="text" name="pilihan_1c" class="form-control @error('pilihan_1c') is-invalid @enderror"
                        id="pilihan_1c" required value="{{ old('pilihan_1c', $quiz->pilihan_1c) }}">
                    @error('pilihan_1c')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_1d" class="form-label">Pilihan d</label>
                    <input type="text" name="pilihan_1d" class="form-control @error('pilihan_1d') is-invalid @enderror"
                        id="pilihan_1d" required value="{{ old('pilihan_1d', $quiz->pilihan_1d) }}">
                    @error('pilihan_1d')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="select" name="jawaban_1">
                        <option>{{ $quiz->pilihan_1a }}</option>
                        <option>{{ $quiz->pilihan_1b }}</option>
                        <option>{{ $quiz->pilihan_1c }}</option>
                        <option>{{ $quiz->pilihan_1d }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_2" class="form-label">Soal 2</label>
                    <input type="text" name="nama_2" class="form-control @error('nama_2') is-invalid @enderror"
                        id="nama_2" required value="{{ old('nama_2', $quiz->soal_2) }}">
                    @error('nama_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_2a" class="form-label">Pilihan a</label>
                    <input type="text" name="pilihan_2a" class="form-control @error('pilihan_2a') is-invalid @enderror"
                        id="pilihan_2a" required value="{{ old('pilihan_2a', $quiz->pilihan_2a) }}">
                    @error('pilihan_2a')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_2b" class="form-label">Pilihan b</label>
                    <input type="text" name="pilihan_2b" class="form-control @error('pilihan_2b') is-invalid @enderror"
                        id="pilihan_2b" required value="{{ old('pilihan_2b', $quiz->pilihan_2b) }}">
                    @error('pilihan_2b')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_2c" class="form-label">Pilihan c</label>
                    <input type="text" name="pilihan_2c" class="form-control @error('pilihan_2c') is-invalid @enderror"
                        id="pilihan_2c" required value="{{ old('pilihan_2c', $quiz->pilihan_2c) }}">
                    @error('pilihan_2c')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_2d" class="form-label">Pilihan d</label>
                    <input type="text" name="pilihan_2d" class="form-control @error('pilihan_2d') is-invalid @enderror"
                        id="pilihan_2d" required value="{{ old('pilihan_2d', $quiz->pilihan_2d) }}">
                    @error('pilihan_2d')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="select" name="jawaban_2">
                        <option>{{ $quiz->pilihan_2a }}</option>
                        <option>{{ $quiz->pilihan_2b }}</option>
                        <option>{{ $quiz->pilihan_2c }}</option>
                        <option>{{ $quiz->pilihan_2d }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_3" class="form-label">Soal 3</label>
                    <input type="text" name="nama_3" class="form-control @error('nama_3') is-invalid @enderror"
                        id="nama_3" required value="{{ old('nama_3', $quiz->soal_3) }}">
                    @error('nama_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_3a" class="form-label">Pilihan a</label>
                    <input type="text" name="pilihan_3a"
                        class="form-control @error('pilihan_3a') is-invalid @enderror" id="pilihan_3a" required
                        value="{{ old('pilihan_3a', $quiz->pilihan_3a) }}">
                    @error('pilihan_3a')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_3b" class="form-label">Pilihan b</label>
                    <input type="text" name="pilihan_3b"
                        class="form-control @error('pilihan_3b') is-invalid @enderror" id="pilihan_3b" required
                        value="{{ old('pilihan_3b', $quiz->pilihan_3b) }}">
                    @error('pilihan_3b')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_3c" class="form-label">Pilihan c</label>
                    <input type="text" name="pilihan_3c"
                        class="form-control @error('pilihan_3c') is-invalid @enderror" id="pilihan_3c" required
                        value="{{ old('pilihan_3c', $quiz->pilihan_3c) }}">
                    @error('pilihan_3c')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_3d" class="form-label">Pilihan d</label>
                    <input type="text" name="pilihan_3d"
                        class="form-control @error('pilihan_3d') is-invalid @enderror" id="pilihan_3d" required
                        value="{{ old('pilihan_3d', $quiz->pilihan_3d) }}">
                    @error('pilihan_3d')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="select" name="jawaban_3">
                        <option>{{ $quiz->pilihan_3a }}</option>
                        <option>{{ $quiz->pilihan_3b }}</option>
                        <option>{{ $quiz->pilihan_3c }}</option>
                        <option>{{ $quiz->pilihan_3d }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_4" class="form-label">Soal 4</label>
                    <input type="text" name="nama_4" class="form-control @error('nama_4') is-invalid @enderror"
                        id="nama_4" required value="{{ old('nama_4', $quiz->soal_4) }}">
                    @error('nama_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_4a" class="form-label">Pilihan a</label>
                    <input type="text" name="pilihan_4a"
                        class="form-control @error('pilihan_4a') is-invalid @enderror" id="pilihan_4a" required
                        value="{{ old('pilihan_4a', $quiz->pilihan_4a) }}">
                    @error('pilihan_4a')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_4b" class="form-label">Pilihan b</label>
                    <input type="text" name="pilihan_4b"
                        class="form-control @error('pilihan_4b') is-invalid @enderror" id="pilihan_4b" required
                        value="{{ old('pilihan_4b', $quiz->pilihan_4b) }}">
                    @error('pilihan_4b')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_4c" class="form-label">Pilihan c</label>
                    <input type="text" name="pilihan_4c"
                        class="form-control @error('pilihan_4c') is-invalid @enderror" id="pilihan_4c" required
                        value="{{ old('pilihan_4c', $quiz->pilihan_4c) }}">
                    @error('pilihan_4c')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_4d" class="form-label">Pilihan d</label>
                    <input type="text" name="pilihan_4d"
                        class="form-control @error('pilihan_4d') is-invalid @enderror" id="pilihan_4d" required
                        value="{{ old('pilihan_4d', $quiz->pilihan_4d) }}">
                    @error('pilihan_4d')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="select" name="jawaban_4">
                        <option>{{ $quiz->pilihan_4a }}</option>
                        <option>{{ $quiz->pilihan_4b }}</option>
                        <option>{{ $quiz->pilihan_4c }}</option>
                        <option>{{ $quiz->pilihan_4d }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_5" class="form-label">Soal 5</label>
                    <input type="text" name="nama_5" class="form-control @error('nama_5') is-invalid @enderror"
                        id="nama_5" required value="{{ old('nama_5', $quiz->soal_5) }}">
                    @error('nama_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_5a" class="form-label">Pilihan a</label>
                    <input type="text" name="pilihan_5a"
                        class="form-control @error('pilihan_5a') is-invalid @enderror" id="pilihan_5a" required
                        value="{{ old('pilihan_5a', $quiz->pilihan_5a) }}">
                    @error('pilihan_5a')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_5b" class="form-label">Pilihan b</label>
                    <input type="text" name="pilihan_5b"
                        class="form-control @error('pilihan_5b') is-invalid @enderror" id="pilihan_5b" required
                        value="{{ old('pilihan_5b', $quiz->pilihan_5b) }}">
                    @error('pilihan_5b')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_5c" class="form-label">Pilihan c</label>
                    <input type="text" name="pilihan_5c"
                        class="form-control @error('pilihan_5c') is-invalid @enderror" id="pilihan_5c" required
                        value="{{ old('pilihan_5c', $quiz->pilihan_5c) }}">
                    @error('pilihan_5c')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pilihan_5d" class="form-label">Pilihan d</label>
                    <input type="text" name="pilihan_5d"
                        class="form-control @error('pilihan_5d') is-invalid @enderror" id="pilihan_5d" required
                        value="{{ old('pilihan_5d', $quiz->pilihan_5d) }}">
                    @error('pilihan_5d')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="select" name="jawaban_5">
                        <option>{{ $quiz->pilihan_5a }}</option>
                        <option>{{ $quiz->pilihan_5b }}</option>
                        <option>{{ $quiz->pilihan_5c }}</option>
                        <option>{{ $quiz->pilihan_5d }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit Quiz</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // document.getElementById('select').value = "{{ $quiz->jawaban_1 }}";
            const inputs = document.querySelectorAll('#pilihan_1a, #pilihan_1b, #pilihan_1c, #pilihan_1d');
            const select = document.getElementById('select');

            inputs.forEach(input => {
                input.addEventListener('input', updateSelectOptions);
            });

            function updateSelectOptions() {
                const optionA = document.getElementById('pilihan_1a').value.trim();
                const optionB = document.getElementById('pilihan_1b').value.trim();
                const optionC = document.getElementById('pilihan_1c').value.trim();
                const optionD = document.getElementById('pilihan_1d').value.trim();

                // Clear the existing options except the first one
                select.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select the correct answer';
                select.appendChild(defaultOption);

                if (optionA) {
                    const optionElementA = document.createElement('option');
                    optionElementA.value = 'a';
                    optionElementA.textContent = optionA;
                    select.appendChild(optionElementA);
                }
                if (optionB) {
                    const optionElementB = document.createElement('option');
                    optionElementB.value = 'b';
                    optionElementB.textContent = optionB;
                    select.appendChild(optionElementB);
                }
                if (optionC) {
                    const optionElementC = document.createElement('option');
                    optionElementC.value = 'c';
                    optionElementC.textContent = optionC;
                    select.appendChild(optionElementC);
                }
                if (optionD) {
                    const optionElementD = document.createElement('option');
                    optionElementD.value = 'd';
                    optionElementD.textContent = optionD;
                    select.appendChild(optionElementD);
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // document.getElementById('select').value = "{{ $quiz->jawaban_2 }}";
            const inputs = document.querySelectorAll('#pilihan_2a, #pilihan_2b, #pilihan_2c, #pilihan_2d');
            const select = document.getElementById('selectt');

            inputs.forEach(input => {
                input.addEventListener('input', updateSelectOptions);
            });

            function updateSelectOptions() {
                const optionA = document.getElementById('pilihan_2a').value.trim();
                const optionB = document.getElementById('pilihan_2b').value.trim();
                const optionC = document.getElementById('pilihan_2c').value.trim();
                const optionD = document.getElementById('pilihan_2d').value.trim();

                // Clear the existing options except the first one
                select.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select the correct answer';
                select.appendChild(defaultOption);

                if (optionA) {
                    const optionElementA = document.createElement('option');
                    optionElementA.value = 'a';
                    optionElementA.textContent = optionA;
                    select.appendChild(optionElementA);
                }
                if (optionB) {
                    const optionElementB = document.createElement('option');
                    optionElementB.value = 'b';
                    optionElementB.textContent = optionB;
                    select.appendChild(optionElementB);
                }
                if (optionC) {
                    const optionElementC = document.createElement('option');
                    optionElementC.value = 'c';
                    optionElementC.textContent = optionC;
                    select.appendChild(optionElementC);
                }
                if (optionD) {
                    const optionElementD = document.createElement('option');
                    optionElementD.value = 'd';
                    optionElementD.textContent = optionD;
                    select.appendChild(optionElementD);
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // document.getElementById('select').value = "{{ $quiz->jawaban_3 }}";
            const inputs = document.querySelectorAll('#pilihan_3a, #pilihan_3b, #pilihan_3c, #pilihan_3d');
            const select = document.getElementById('selecttt');

            inputs.forEach(input => {
                input.addEventListener('input', updateSelectOptions);
            });

            function updateSelectOptions() {
                const optionA = document.getElementById('pilihan_3a').value.trim();
                const optionB = document.getElementById('pilihan_3b').value.trim();
                const optionC = document.getElementById('pilihan_3c').value.trim();
                const optionD = document.getElementById('pilihan_3d').value.trim();

                // Clear the existing options except the first one
                select.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select the correct answer';
                select.appendChild(defaultOption);

                if (optionA) {
                    const optionElementA = document.createElement('option');
                    optionElementA.value = 'a';
                    optionElementA.textContent = optionA;
                    select.appendChild(optionElementA);
                }
                if (optionB) {
                    const optionElementB = document.createElement('option');
                    optionElementB.value = 'b';
                    optionElementB.textContent = optionB;
                    select.appendChild(optionElementB);
                }
                if (optionC) {
                    const optionElementC = document.createElement('option');
                    optionElementC.value = 'c';
                    optionElementC.textContent = optionC;
                    select.appendChild(optionElementC);
                }
                if (optionD) {
                    const optionElementD = document.createElement('option');
                    optionElementD.value = 'd';
                    optionElementD.textContent = optionD;
                    select.appendChild(optionElementD);
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // document.getElementById('select').value = "{{ $quiz->jawaban_4 }}";
            const inputs = document.querySelectorAll('#pilihan_4a, #pilihan_4b, #pilihan_4c, #pilihan_4d');
            const select = document.getElementById('selectttt');

            inputs.forEach(input => {
                input.addEventListener('input', updateSelectOptions);
            });

            function updateSelectOptions() {
                const optionA = document.getElementById('pilihan_4a').value.trim();
                const optionB = document.getElementById('pilihan_4b').value.trim();
                const optionC = document.getElementById('pilihan_4c').value.trim();
                const optionD = document.getElementById('pilihan_4d').value.trim();

                // Clear the existing options except the first one
                select.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select the correct answer';
                select.appendChild(defaultOption);

                if (optionA) {
                    const optionElementA = document.createElement('option');
                    optionElementA.value = 'a';
                    optionElementA.textContent = optionA;
                    select.appendChild(optionElementA);
                }
                if (optionB) {
                    const optionElementB = document.createElement('option');
                    optionElementB.value = 'b';
                    optionElementB.textContent = optionB;
                    select.appendChild(optionElementB);
                }
                if (optionC) {
                    const optionElementC = document.createElement('option');
                    optionElementC.value = 'c';
                    optionElementC.textContent = optionC;
                    select.appendChild(optionElementC);
                }
                if (optionD) {
                    const optionElementD = document.createElement('option');
                    optionElementD.value = 'd';
                    optionElementD.textContent = optionD;
                    select.appendChild(optionElementD);
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // document.getElementById('select').value = "{{ $quiz->jawaban_5 }}";
            const inputs = document.querySelectorAll('#pilihan_5a, #pilihan_5b, #pilihan_5c, #pilihan_5d');
            const select = document.getElementById('selecttttt');

            inputs.forEach(input => {
                input.addEventListener('input', updateSelectOptions);
            });

            function updateSelectOptions() {
                const optionA = document.getElementById('pilihan_5a').value.trim();
                const optionB = document.getElementById('pilihan_5b').value.trim();
                const optionC = document.getElementById('pilihan_5c').value.trim();
                const optionD = document.getElementById('pilihan_5d').value.trim();

                // Clear the existing options except the first one
                select.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select the correct answer';
                select.appendChild(defaultOption);

                if (optionA) {
                    const optionElementA = document.createElement('option');
                    optionElementA.value = 'a';
                    optionElementA.textContent = optionA;
                    select.appendChild(optionElementA);
                }
                if (optionB) {
                    const optionElementB = document.createElement('option');
                    optionElementB.value = 'b';
                    optionElementB.textContent = optionB;
                    select.appendChild(optionElementB);
                }
                if (optionC) {
                    const optionElementC = document.createElement('option');
                    optionElementC.value = 'c';
                    optionElementC.textContent = optionC;
                    select.appendChild(optionElementC);
                }
                if (optionD) {
                    const optionElementD = document.createElement('option');
                    optionElementD.value = 'd';
                    optionElementD.textContent = optionD;
                    select.appendChild(optionElementD);
                }
            }
        });
    </script>
@endsection
