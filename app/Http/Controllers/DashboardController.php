<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Matpel;
use App\Models\Quiz;
use App\Models\Materi;
use App\Models\Hasil;
use Illuminate\Support\Facades\Auth;
// use Auth;
// use Illuminate\Http\Auth;

class DashboardController extends Controller
{
    public function index(){
        $this->authorize('isUser');
        $guru = User::where('role_id', 2)->get();
        return view('home', compact('guru'));
    }

    public function guru(){
        $this->authorize('isGuru');
        return view('homeguru');
    }

    // public function matapelajaran(){
    //     $this->authorize('isGuru');
    //     return view('matpel');
    // }

    public function admin(){
        $this->authorize('isAdmin');
        return view('admin');
    }

    public function update($dosen, $materi, $bab, $id)
{
    // Memastikan otorisasi pengguna
    $this->authorize('isUser');

    // Mengambil semua guru (pengguna dengan role_id = 2)
    $guru = User::where('role_id', 2)->get();

    // Mengambil informasi mata pelajaran spesifik berdasarkan nama guru dan nama materi
    $matpel = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
        ->where('users.role_id', 2)
        ->where('users.nama', $dosen)
        ->where('matpel.nama_matpel', $materi)
        ->select('matpel.*')
        ->first();

    // Mengambil semua materi yang terkait dengan mata pelajaran ini
    $materiData = Materi::where('id_matpel', $matpel->id)->get();

    // Mengambil detail dari bab tertentu berdasarkan $bab yang diterima dari parameter
    $selectedBab = Materi::findOrFail($id);

    // Mengambil materi yang dipilih berdasarkan $id yang diterima dari parameter
    $materi = Materi::find($id);

    // Logika untuk menghitung progres atau hasil belajar (disesuaikan dengan aplikasi Anda)
    $totalMateri = $materiData->count();
    $jawabanBenar = 0; // Jumlah jawaban yang benar (sesuaikan dengan logika aplikasi Anda)

    // Mendapatkan hasil belajar pengguna untuk materi ini
    $hasil = Hasil::where('user_id', auth()->user()->id)
                  ->where('id_materi', $materi->id)
                  ->first();

    if ($hasil) {
        // Jika sudah ada catatan hasil belajar, update progresnya
        $hasil->update(['progres' => ($jawabanBenar / $totalMateri) * 100]);
    } else {
        // Jika belum ada catatan hasil belajar, buat yang baru
        Hasil::create([
            'user_id' => auth()->user()->id,
            'id_materi' => $materi->id,
            'progres' => ($jawabanBenar / $totalMateri) * 100
        ]);
    }

    // Mengembalikan view dengan data yang dibutuhkan
    return view('sidebar', [
        'guru' => $guru,
        'matpel' => $matpel,
        'materi' => $materiData,
        'selectedMateri' => $selectedBab, // Mengirimkan bab yang dipilih untuk ditampilkan di sidebar
        'bab' => $bab,
        'dosen' => $dosen,
    ]);
}


    public function matpel($nama){
        // $data = User::where('nama', $nama)->where('role_id', 2)->get();
        $this->authorize('isUser');

        $guru = User::where('role_id', 2)->get();
        
        $pemateri = User::join('matpel', 'users.id', 'matpel.id_guru')->where('users.role_id', 2)->where('users.nama', $nama)->get();

       //  dd($guru);
       // dd($guru);

        return view('bab', compact('guru', 'pemateri'));
    }

    // public function materi($dosen,$materi){
    // $this->authorize('isUser');

    // // Mendapatkan semua guru (pengguna dengan role_id = 2)
    // $guru = User::where('role_id', 2)->get();

    // // Mengambil informasi mata pelajaran spesifik berdasarkan nama guru dan nama materi
    // $matpel = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
    //     ->where('users.role_id', 2)
    //     ->where('users.nama', $dosen)
    //     ->where('matpel.nama_matpel', $materi)
    //     ->select('matpel.*')
    //     ->first();

    //     // $datu = User::join('matpel', 'users.id', 'matpel.id_guru')
    //     // ->join('materi', 'matpel.id', 'materi.id_matpel')
    //     // ->where('users.role_id', 2)
    //     // ->where('users.nama', $dosen)
    //     // ->where('matpel.nama_matpel', $materi)
    //     // ->select('users.nama as nama_guru', 'matpel.nama_matpel', 'materi.*')
    //     // ->get();

    //             //         // Ambil data quiz yang sesuai dengan materi
    //     // $quizIds = $datu->pluck('id_quiz')->toArray();
    //     // $quiz = Quiz::whereIn('id', $quizIds)->get();

    // // Mengambil semua materi yang terkait dengan mata pelajaran ini
    // $materiData = Materi::where('id_matpel', $matpel->id)->get();

    // $datu = User::join('matpel', 'users.id', 'matpel.id_guru')
    //     ->join('materi', 'matpel.id', 'materi.id_matpel')
    //     ->where('users.role_id', 2)
    //     ->where('users.nama', $dosen)
    //     ->where('matpel.nama_matpel', $materi)
    //     ->select('users.nama as nama_guru', 'matpel.nama_matpel', 'materi.*')
    //     ->get();

    //     // Ambil data quiz yang sesuai dengan materi
    // $quizIds = $datu->pluck('id_quiz')->toArray();
    // $quiz = Quiz::whereIn('id', $quizIds)->get();

    // // Ambil data progres belajar pengguna
    // $completedMateri = 0; // Sementara ini, Anda perlu mengimplementasikan logika untuk mendapatkan progres belajar

    // $selectedMateri = null;

    //  // Jika terdapat query parameter 'selectedMateriId', ambil data materi terkait
    // $selectedMateriId = request()->query('selectedMateriId');
    // if ($selectedMateriId) {
    //     $selectedMateri = Materi::find($selectedMateriId);
    // }else {
    //     // Jika tidak ada materi yang dipilih, tampilkan materi pertama dari daftar
    //     $selectedMateri = $materiData->first();
    // }

    // // $selectedBab = request()->query('selectedMateriId');

    // // $selectedMateri = $selectedBab ? Materi::find($selectedBab) : null;

    // return view('listmateri', [
    //     'guru' => $guru,
    //     'matpel' => $matpel,
    //     'materi' => $materiData,
    //     'selectedMateri' => $selectedMateri,
    //     'quiz' => $quiz,
    //     'dosen' => $dosen,
    //     'completedMateri' => $completedMateri,
    //     'datu' => $datu
    // ]);
    // }

    public function materi($dosen, $materi) {
    $this->authorize('isUser');

    // Mendapatkan semua guru (pengguna dengan role_id = 2)
    $guru = User::where('role_id', 2)->get();

    // Mengambil informasi mata pelajaran spesifik berdasarkan nama guru dan nama materi
    $matpel = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
        ->where('users.role_id', 2)
        ->where('users.nama', $dosen)
        ->where('matpel.nama_matpel', $materi)
        ->select('matpel.*')
        ->first();

    // Mengambil semua materi yang terkait dengan mata pelajaran ini
    $materiData = Materi::where('id_matpel', $matpel->id)->get();

    // Mengambil informasi spesifik untuk setiap materi, termasuk kuis yang terkait
    $datu = User::join('matpel', 'users.id', 'matpel.id_guru')
        ->join('materi', 'matpel.id', 'materi.id_matpel')
        ->where('users.role_id', 2)
        ->where('users.nama', $dosen)
        ->where('matpel.nama_matpel', $materi)
        ->select('users.nama as nama_guru', 'matpel.nama_matpel', 'materi.*')
        ->get();

    // Ambil data quiz yang sesuai dengan materi
    $quizIds = $datu->pluck('id_quiz')->toArray();
    $quiz = Quiz::whereIn('id', $quizIds)->get();

    // Ambil data progres belajar pengguna
    $completedMateri = Hasil::where('user_id', auth()->user()->id)
                                  ->whereIn('id_materi', $datu->pluck('id'))
                                  ->count();

    $completedMaterii = Hasil::where('user_id', auth()->user()->id)
                                  ->whereIn('id_materi', $datu->pluck('id')->toArray())
                                  ->get();

    // // Inisialisasi materi yang dipilih
    // $selectedMateri = null;

    // Jika terdapat query parameter 'selectedMateriId', ambil data materi terkait
    $selectedMateriId = request()->query('materi');
    if ($selectedMateriId) {
        $selectedMateri = Materi::find($selectedMateriId);
    } else {
        // Jika tidak ada materi yang dipilih, tampilkan materi pertama dari daftar
        $selectedMateri = $materiData->first();
    }

    $totalMateri = $materiData->count();
    $jawabanBenar = 0; // Jumlah jawaban yang benar (sesuaikan dengan logika aplikasi Anda)

    // Mendapatkan hasil belajar pengguna untuk materi ini
    $hasil = Hasil::where('user_id', auth()->user()->id)
                  ->where('id_materi', $selectedMateri->id)
                  ->first();

                //   $hasil = Hasil::where('user_id', auth()->user()->id)
                //   ->where('id_materi', $selectedBab->id)
                //   ->first();

    if ($hasil) {
        // Jika sudah ada catatan hasil belajar, update progresnya
        // $hasil->update(['progres' => ($jawabanBenar / $totalMateri) * 100]);
    } else {
        // Jika belum ada catatan hasil belajar, buat yang baru
        Hasil::create([
            'user_id' => auth()->user()->id,
            'id_materi' => $selectedMateri->id,
            'progres' => ($jawabanBenar / $totalMateri) * 100
        ]);
    }

    return view('listmateri', [
        'guru' => $guru,
        'matpel' => $matpel,
        'materi' => $materiData,
        'selectedMateri' => $selectedMateri,
        'quiz' => $quiz,
        'dosen' => $dosen,
        'completedMateri' => $completedMateri,
        'completedMaterii' => $completedMaterii,
        'datu' => $datu
    ]);
}


    
    public function store(Request $request)
        {
            // dd($request);
            $quizId = $request->input('quiz_id');
            $quiz = Quiz::find($quizId);
            // dd($quiz);

            if (!$quiz) {
                return redirect()->back()->with('error', 'Quiz not found.');
            }

            $totalQuestions = 5; // Total number of questions
            $correctAnswers = 0;

            // Check answers
            if ($request->input('pilihan_1') === $quiz->jawaban_1) $correctAnswers++;
            if ($request->input('pilihan_2') === $quiz->jawaban_2) $correctAnswers++;
            if ($request->input('pilihan_3') === $quiz->jawaban_3) $correctAnswers++;
            if ($request->input('pilihan_4') === $quiz->jawaban_4) $correctAnswers++;
            if ($request->input('pilihan_5') === $quiz->jawaban_5) $correctAnswers++;

            $score = ($correctAnswers / $totalQuestions) * 100;
            $isPassed = $score >= 60;
            // dd($guruNama);
            $user_id = auth()->user()->id;

            if ($isPassed) {
                return redirect('/dashboard')->with([
            'success' => 'Selamat, Anda lulus dengan skor ' . $score . '%. Silakan pilih mata pelajaran berikutnya.',
            'score' => $score,
            'isPassed' => $isPassed
        ]);
             } else {
                // Reset progress belajar ke 0%

        // Ambil ID matpel dari quiz untuk mencari semua materi terkait
        $id_guru = $quiz->guru_id;
        $materiIds = Materi::whereHas('matpel', function ($query) use ($id_guru) {
            $query->where('id_guru', $id_guru);
        })->pluck('id')->toArray();
                // $materiIds = Materi::where('user_id', $user_id)->pluck('id')->toArray();

                Hasil::where('user_id', $user_id)->whereIn('id_materi', $materiIds)->delete();

                return redirect('/dashboard')->with([
                'error' => 'Maaf, Anda belum lulus dengan skor ' . $score . '%. Silakan mengulang mata pelajaran.',
                'score' => $score,
                'isPassed' => $isPassed
                ]);
            }
        }

//      public function baba($dosen, $materi, $bab)
// {
//     // dd($dosen, $materi, $bab);
//     // Memastikan otorisasi pengguna
//     $this->authorize('isUser');

//     // Mendapatkan semua guru (pengguna dengan role_id = 2)
//     $guru = User::where('role_id', 2)->get();

//     // Mengambil informasi mata pelajaran spesifik berdasarkan nama guru dan nama materi
//     $matpel = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
//         ->where('users.role_id', 2)
//         ->where('users.nama', $dosen)
//         ->where('matpel.nama_matpel', $materi)
//         ->select('matpel.*')
//         ->first();

//         $datu = User::join('matpel', 'users.id', 'matpel.id_guru')
//         ->join('materi', 'matpel.id', 'materi.id_matpel')
//         ->where('users.role_id', 2)
//         ->where('users.nama', $dosen)
//         ->where('matpel.nama_matpel', $materi)
//         ->select('users.nama as nama_guru', 'matpel.nama_matpel', 'materi.*')
//         ->get();

//                 // Ambil data quiz yang sesuai dengan materi
//         $quizIds = $datu->pluck('id_quiz')->toArray();
//         $quiz = Quiz::whereIn('id', $quizIds)->get();

//     // Mengambil semua materi yang terkait dengan mata pelajaran ini
//     $materiData = Materi::where('id_matpel', $matpel->id)->get();

//      $selectedBab = request()->query('selectedMateriId');

//     $selectedMateri = $selectedBab ? Materi::find($selectedBab) : null;

//     // Mengembalikan tampilan dengan data yang dibutuhkan
//     return view('listmateri', [
//         'guru' => $guru,
//         'matpel' => $matpel,
//         'materi' => $materiData,
//         'selectedMateri' => $selectedMateri,
//         'bab' => $bab,
//         'quiz' => $quiz,
//         'dosen' => $dosen,
//     ]);
// }
public function baba($dosen, $materi, $bab)
{
    // dd($dosen, $materi, $bab);
    // Memastikan otorisasi pengguna
    $this->authorize('isUser');

    // Mengambil semua guru (pengguna dengan role_id = 2)
    $guru = User::where('role_id', 2)->get();

    // Mengambil informasi mata pelajaran spesifik berdasarkan nama guru dan nama materi
    $matpel = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
        ->where('users.role_id', 2)
        ->where('users.nama', $dosen)
        ->where('matpel.nama_matpel', $materi)
        ->select('matpel.*')
        ->firstOrFail();

    // Mengambil semua materi yang terkait dengan mata pelajaran ini
    $materiData = Materi::where('id_matpel', $matpel->id)->get();

    // Mengambil detail dari bab tertentu berdasarkan $bab yang diterima dari parameter
    // $selectedBab = Materi::where('nama_bab', $bab)->firstOrFail();
    $selectedBab = Materi::where('id_matpel', $matpel->id)
        ->where('nama_bab', $bab)
        ->firstOrFail();
        // dd($selectedBab);

    // $datu = User::join('matpel', 'users.id', 'matpel.id_guru')
    //     ->join('materi', 'matpel.id', 'materi.id_matpel')
    //     ->where('users.role_id', 2)
    //     ->where('users.nama', $dosen)
    //     ->where('matpel.nama_matpel', $materi)
    //     ->select('users.nama as nama_guru', 'matpel.nama_matpel', 'materi.*')
    //     ->get();

    // // Ambil data quiz yang sesuai dengan materi
    // $quizIds = $datu->pluck('id_quiz')->toArray();
    // $quiz = Quiz::whereIn('id', $quizIds)->get();

    // Ambil data progres belajar pengguna
    $completedMateri = Hasil::where('user_id', auth()->user()->id)
        ->whereIn('id_materi', $materiData->pluck('id'))
        ->count();

    $completedMaterii = Hasil::where('user_id', auth()->user()->id)
        ->whereIn('id_materi', $materiData->pluck('id')->toArray())
        ->get();

    // // Inisialisasi materi yang dipilih
    // $selectedMateri = $selectedBab;

    // Jika terdapat query parameter 'selectedMateriId', ambil data materi terkait
    $selectedMateriId = request()->query('materi');
    if ($selectedMateriId) {
        $selectedMateri = Materi::find($selectedMateriId);
    } else {
        // Jika tidak ada materi yang dipilih, tampilkan materi pertama dari daftar
        // $selectedMateri = $materiData->first();
        $selectedMateri = $selectedBab;
    }

    // Logika untuk menghitung progres atau hasil belajar (disesuaikan dengan aplikasi Anda)
    $totalMateri = $materiData->count();
    $jawabanBenar = 0; // Jumlah jawaban yang benar (sesuaikan dengan logika aplikasi Anda)

    // Mendapatkan hasil belajar pengguna untuk materi ini
    $hasil = Hasil::where('user_id', auth()->user()->id)
                  ->where('id_materi', $selectedBab->id)
                  ->first();

                //   $hasil = Hasil::where('user_id', auth()->user()->id)
                //   ->where('id_materi', $selectedBab->id)
                //   ->first();

    if ($hasil) {
        // Jika sudah ada catatan hasil belajar, update progresnya
        // $hasil->update(['progres' => ($jawabanBenar / $totalMateri) * 100]);
    } else {
        // Jika belum ada catatan hasil belajar, buat yang baru
        Hasil::create([
            'user_id' => auth()->user()->id,
            'id_materi' => $selectedBab->id,
            'progres' => ($jawabanBenar / $totalMateri) * 100
        ]);
    }

    // Mengembalikan view dengan data yang dibutuhkan
    return view('sidebar', [
        'guru' => $guru,
        'matpel' => $matpel,
        'materi' => $materiData,
        'selectedMateri' => $selectedMateri, // Mengirimkan bab yang dipilih untuk ditampilkan di sidebar
        'bab' => $selectedMateri->nama_bab,
        'dosen' => $dosen,
        'completedMateri' => $completedMateri,
        'completedMaterii' => $completedMaterii,
    ]);
}


    public function quiz($dosen, $materi) {
    $this->authorize('isUser');

    // Mengambil informasi mata pelajaran spesifik berdasarkan nama guru dan nama materi
    $matpel = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
        ->where('users.role_id', 2)
        ->where('users.nama', $dosen)
        ->where('matpel.nama_matpel', $materi)
        ->select('matpel.*')
        ->firstOrFail();

    // Mengambil semua materi yang terkait dengan mata pelajaran ini
    $materiData = Materi::where('id_matpel', $matpel->id)->get();

    // Ambil data progres belajar pengguna
    $completedMateri = Hasil::where('user_id', auth()->user()->id)
        ->whereIn('id_materi', $materiData->pluck('id'))
        ->count();

    // Memeriksa apakah pengguna telah menyelesaikan semua materi
    $totalMateri = $materiData->count();
    if ($completedMateri < $totalMateri) {
        return redirect()->back()->with('error', 'Anda harus menyelesaikan semua materi sebelum mengambil kuis.');
    }
    
    // Mengambil data materi yang sesuai dengan dosen dan materi
    $datu = User::join('matpel', 'users.id', 'matpel.id_guru')
        ->join('materi', 'matpel.id', 'materi.id_matpel')
        ->where('users.role_id', 2)
        ->where('users.nama', $dosen)
        ->where('matpel.nama_matpel', $materi)
        ->select('materi.id_quiz')
        ->get();
        
    // Mengambil ID kuis dari hasil penggabungan tabel
    $quizIds = $datu->pluck('id_quiz')->toArray();
    
    // Mengambil kuis berdasarkan ID yang didapat
    $quiz = Quiz::whereIn('id', $quizIds)->get();
    
    // Mengambil data guru
    $guru = User::where('role_id', 2)->get();
    
    return view('quizz', compact('guru', 'quiz'));
}

    public function super(){
        $this->authorize('isSuper');
        return view('super');
    }

}
