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

    public function guru($nama){
        // $data = User::where('nama', $nama)->where('role_id', 2)->get();
        $this->authorize('isUser');

        $guru = User::where('role_id', 2)->get();
        
        $pemateri = User::join('matpels', 'users.id', 'materi.user_id')->where('users.role_id', 2)->where('users.nama', $nama)->get();

       //  dd($guru);
       // dd($guru);

        return view('materi', compact('guru', 'pemateri'));
    }
}
