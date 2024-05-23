<?php

namespace App\Http\Controllers;

use App\Models\Matpel;
use Illuminate\Http\Request;

class MatpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isGuru');
        return view('matpel', [
            'matpel' => Matpel::where('id_guru', auth()->user()->id)->get()
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
        return view('matpelcreate');
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
            'nama' => 'required|max:255'
        ]);

        // $validatedData['id_guru'] = auth()->user()->id;

        Matpel::create([
            'nama_matpel' => $request->nama,
            'id_guru' => auth()->user()->id
        ]);

        return redirect('/guru/matapelajaran')->with('success', 'New mata pelajaran has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function show(Matpel $matpel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function edit(Matpel $matpel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matpel $matpel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matpel $matpel, $id)
    {
        $matpel::where('id', $id) ->delete();
        
        return redirect('/guru/matapelajaran')->with('success', 'Mata pelajaran has been deleted!');
    }
}