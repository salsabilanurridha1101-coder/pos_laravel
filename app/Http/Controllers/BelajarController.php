<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index(){
        return view("belajar");
    }

    public function tambah(){
        return view('tambah');
    }

    public function kurang(){
        return view('kurang');
    }

    public function bagi(){
        return view('bagi');
    }

    public function kali(){
        return view('kali');
    }

    public function storeTambah(Request $request){

        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }

    public function storeKurang(Request $request)
    {

        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 - $angka2;
        return view('kurang', compact('jumlah'));
    }

    public function storeBagi(Request $request)
    {

        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 / $angka2;
        return view('bagi', compact('jumlah'));
    }

    public function storeKali(Request $request)
    {

        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 * $angka2;
        return view('kali', compact('jumlah'));
    }
}
