<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('calculator');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nilai1 = $request -> nilai1;
        $nilai2 = $request -> nilai2;
        $hasil = 0;

        switch($request->simbol){
            case '*':
                $hasil = $nilai1 * $nilai2;
                break;
            case '/':
                $hasil = $nilai2 != 0 ? $nilai1 / $nilai2 : 0;
                break;
            case '+':
                $hasil = $nilai1 + $nilai2;
                break;
            case '-':
                $hasil = $nilai1 - $nilai2;
                break;
        }

        // insert ke table calculator
        Calculator::create([
            "nilai1" => $nilai1,
            "simbol" => $request -> simbol,
            "nilai2" => $nilai2,
            "hasil" => $hasil
        ]);

        return view('calculator', compact('hasil'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
