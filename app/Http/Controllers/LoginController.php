<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function actionLogin(Request $request){
        $credentials = $request->only('email,password');
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
       //klao login tidak berhasil pake alert
       Alert::warning('YAHH!', 'Invalid credentials');
       return back()->withInput($request->only('email'));
    }
}
