<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

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
            return response()->json($products);
            //  try {
            // $products = Product::with('category')->get();
            // return response()->json([
            //     'message' => 'Fetch Product success',
            //     'status' => true,
            // //     'data' => $products,
            // ]);
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
        try {
            DB::beginTransaction();
            $order = Order::create([
                'order_code' => $request->order_code,
                'order_amount' => $request->subtotal,
                'order_status' => 1,
                'order_subtotal' => $request->grandTotal
            ]);

            foreach($request->cart as $item){
                OrderDetail::insert([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'qty' => $item['quantity'],
                    'order_price' => $item['product_price'],
                ]);
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'order_code' => $request->order_code
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ],500);
        }
    }
    public function paymentCashless(Request $request){
        try {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $itemDetails = [];
        foreach($request->cart as $item){
            $itemDetails[]= [
                'id' => $item['id'],
                'price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'name' => substr($item['product_name'], 0,50),
            ];
            }
        $payload = [
            'transaction_details' => [
                'order_id' => $request->order_code,
                'gross_amount' => $request->grandTotal
            ],
            'customer_details' => [
                'first_name' => 'Customer',
                'email' => 'customer@gmail.com',
            ],
            'item_details' => $itemDetails,
        ];
        $snapToken = Snap::getSnapToken($payload);
        return response()->json([
                'status' => 'success',
                'snapToken' => $snapToken,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'snapToken' => $th->getMessage()
            ]);
        }
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
