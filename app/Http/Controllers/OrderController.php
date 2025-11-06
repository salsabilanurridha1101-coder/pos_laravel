<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "All Transaction";
        $datas = [];
        return view('order.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $prefix = "ODR";
        $date = now()->format('dmy');
        $lastTransaction = Order::whereDate('created_at', now()->toDateString())->orderBy('id','desc')->first(); //example 1
        // $lastTransaction = Order::whereDate('created_at' .now()->toDateString())->get()->last(); //example 2

        $lastNumber = 0;
        if($lastTransaction){
            // (substr, potong karakter) -> -4-> ORD-101125-0001 -> 0001
            $lastNumber = (int) substr($lastTransaction->order_code, -4);
        }
        $runningNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        $order_code = $prefix ."-" . $date. "-".$runningNumber;
        return view('order.create', compact('categories', 'order_code'));
    }

    public function getProducts()
    {
        try {
            $products = Product::with('category')->get();
            return response()->json([
                'message' => 'Fetch Product success',
                'status' => true,
                'data' => $products,
            ]);
            //code...
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Fetch Product success',
                'status' => false,
                'data' => $th->getMessage()
            ], 500);
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
