<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function indexe(Request $request){
        $validasi = $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required']
        ]);
         if(Auth::attempt($validasi)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
         }

         return back()->with('loginError','Login gagal!');
    }

    public function akunbaru(){
        return view('registrasi');

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => ['required','max:255'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:5','max:255']
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);



        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role,
        ]);
        

        $request->session()->flash('success','Registrasi sukses! Silahkan login');
        
        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
