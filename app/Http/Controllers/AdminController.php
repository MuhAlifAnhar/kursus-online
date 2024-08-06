<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\Hasil;
use App\Models\Matpel;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isSuper');


        // $super = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
        //     ->join('materi', 'matpel.id', '=', 'materi.id_matpel')
        //     ->where('users.role_id', 2)
        //     ->get();

        // $super = User::join('matpel', 'users.id', '=', 'matpel.id_guru')
        //     ->join('quizs', 'users.id', '=', 'quizs.guru_id')
        //     ->where('users.role_id', 2)
        //     ->get();


        return view('akunguru', [
            'super' => User::where('role_id', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Mengambil semua matpel yang terkait dengan user ini
    $matpels = \App\Models\Matpel::where('id_guru', $id)->get();

    foreach ($matpels as $matpel) {
        // Menghapus materi yang terkait dengan matpel ini
        \App\Models\Materi::where('id_matpel', $matpel->id)->delete();
    }

    // Menghapus quiz yang terkait dengan user ini
    \App\Models\Quiz::where('guru_id', $id)->delete();

    // Menghapus matpel yang terkait dengan user ini
    \App\Models\Matpel::where('id_guru', $id)->delete();

    // Menghapus user
    \App\Models\User::destroy($id);

    return redirect('/super/admin')->with('sukses', 'Akun telah dihapus!');
}


}
