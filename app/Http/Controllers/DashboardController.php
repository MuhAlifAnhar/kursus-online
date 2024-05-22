<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function matpel($nama){
        // $data = User::where('nama', $nama)->where('role_id', 2)->get();
        $this->authorize('isUser');

        $guru = User::where('role_id', 2)->get();
        
        $pemateri = User::join('matpel', 'users.id', 'matpel.id_guru')->where('users.role_id', 2)->where('users.nama', $nama)->get();

       //  dd($guru);
       // dd($guru);

        return view('materi', compact('guru', 'pemateri'));
    }

    public function materi($dosen,$materi){
        // $data = User::where('nama', $nama)->where('role_id', 2)->get();
        $this->authorize('isUser');

        $guru = User::where('role_id', 2)->get();
        
        $pemateri = User::join('matpel', 'users.id',  'matpel.id_guru')->join('materi', 'matpel.id', 'materi.id_matpel')->get();
        dd($pemateri);
       //  dd($guru);
       // dd($guru);

        return view('materi', compact('guru', 'pemateri'));
    }
}
