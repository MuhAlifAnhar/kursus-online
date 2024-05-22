<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isGuru');
        $quizzes = Quiz::all();
        return view('quiz', [
            'quiz' => $quizzes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isGuru');
        return view('quizcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'soal_1' => 'required|string|max:255',
            'pilihan_1a' => 'required|string|max:255',
            'pilihan_1b' => 'required|string|max:255',
            'pilihan_1c' => 'required|string|max:255',
            'pilihan_1d' => 'required|string|max:255',
            'jawaban_1' => 'required|in:a,b,c,d',
            'soal_2' => 'required|string|max:255',
            'pilihan_2a' => 'required|string|max:255',
            'pilihan_2b' => 'required|string|max:255',
            'pilihan_2c' => 'required|string|max:255',
            'pilihan_2d' => 'required|string|max:255',
            'jawaban_2' => 'required|in:a,b,c,d',
            'soal_3' => 'required|string|max:255',
            'pilihan_3a' => 'required|string|max:255',
            'pilihan_3b' => 'required|string|max:255',
            'pilihan_3c' => 'required|string|max:255',
            'pilihan_3d' => 'required|string|max:255',
            'jawaban_3' => 'required|in:a,b,c,d',
            'soal_4' => 'required|string|max:255',
            'pilihan_4a' => 'required|string|max:255',
            'pilihan_4b' => 'required|string|max:255',
            'pilihan_4c' => 'required|string|max:255',
            'pilihan_4d' => 'required|string|max:255',
            'jawaban_4' => 'required|in:a,b,c,d',
            'soal_5' => 'required|string|max:255',
            'pilihan_5a' => 'required|string|max:255',
            'pilihan_5b' => 'required|string|max:255',
            'pilihan_5c' => 'required|string|max:255',
            'pilihan_5d' => 'required|string|max:255',
            'jawaban_5' => 'required|in:a,b,c,d'
        ]);

        Quiz::create([
            'soal_1' => $request->soal_1,
            'pilihan_1a' => $request->pilihan_1a,
            'pilihan_1b' => $request->pilihan_1b,
            'pilihan_1c' => $request->pilihan_1c,
            'pilihan_1d' => $request->pilihan_1d,
            'jawaban_1' => $request->jawaban_1,
            'soal_2' => $request->soal_2,
            'pilihan_2a' => $request->pilihan_2a,
            'pilihan_2b' => $request->pilihan_2b,
            'pilihan_2c' => $request->pilihan_2c,
            'pilihan_2d' => $request->pilihan_2d,
            'jawaban_2' => $request->jawaban_2,
            'soal_3' => $request->soal_3,
            'pilihan_3a' => $request->pilihan_3a,
            'pilihan_3b' => $request->pilihan_3b,
            'pilihan_3c' => $request->pilihan_3c,
            'pilihan_3d' => $request->pilihan_3d,
            'jawaban_3' => $request->jawaban_3,
            'soal_4' => $request->soal_4,
            'pilihan_4a' => $request->pilihan_4a,
            'pilihan_4b' => $request->pilihan_4b,
            'pilihan_4c' => $request->pilihan_4c,
            'pilihan_4d' => $request->pilihan_4d,
            'jawaban_4' => $request->jawaban_4,
            'soal_5' => $request->soal_5,
            'pilihan_5a' => $request->pilihan_5a,
            'pilihan_5b' => $request->pilihan_5b,
            'pilihan_5c' => $request->pilihan_5c,
            'pilihan_5d' => $request->pilihan_5d,
            'jawaban_5' => $request->jawaban_5,

        ]);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect('/guru/quiz')->with('success', 'Kuis berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(quiz $quiz)
    {
        //
    }
}
