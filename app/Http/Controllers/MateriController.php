<?php

namespace App\Http\Controllers;

use App\Models\Matpel;
use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $this->authorize('isGuru');
    
    $matpel = Matpel::where('id_guru', auth()->user()->id)->get();
    $materi = Materi::whereIn('id_matpel', $matpel->pluck('id'))->get();
    $quiz = Quiz::where('guru_id', auth()->user()->id)->get();

    return view('materibab', [
        'matpel' => $matpel,
        'materi' => $materi,
        'quiz' => $quiz
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

        $quizzes = Quiz::where('guru_id', auth()->user()->id)->get();
        $matpels = Matpel::where('id_guru', auth()->user()->id)->get();

        return view('matericreate', [
        'quizzes' => $quizzes,
        'matpels' => $matpels
        ]);
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
            'nama_bab' => 'required|max:255',
            'isi_bab' => 'required',
            'id_quiz' => 'required|max:255',
            'id_matpel'=> 'required|max:255'
        ]);

        // $validatedData['id_guru'] = auth()->user()->id;

        Materi::create([
            'nama_bab' => $request->nama_bab,
            'isi_bab' => $request->isi_bab,
            'id_quiz' => $request->id_quiz,
            'id_matpel' => $request->id_matpel
        ]);

        return redirect('/guru/materi')->with('success', 'New matari has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        $this->authorize('isGuru');

        $quizzes = Quiz::where('guru_id', auth()->user()->id)->get();
        $matpels = Matpel::where('id_guru', auth()->user()->id)->get();

        return view('materiedit', [
            'materi' => $materi,
            'quizzes' => $quizzes,
            'matpels' => $matpels
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $this->authorize('isGuru');

        $request->validate([
            'nama_bab' => 'required|max:255',
            'isi_bab' => 'required',
            'id_quiz' => 'required|exists:quizs,id',
            'id_matpel'=> 'required|exists:matpel,id'
        ]);

        $materi->update([
            'nama_bab' => $request->nama_bab,
            'isi_bab' => $request->isi_bab,
            'id_quiz' => $request->id_quiz,
            'id_matpel' => $request->id_matpel
        ]);

        return redirect('/guru/materi')->with('success', 'Materi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materi::where('id', $id)->delete();

        return redirect('/guru/materi')->with('success', 'Materi has been deleted!');
    }
}
