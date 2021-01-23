<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderServices;

class OrderController extends Controller
{
     /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->order = new OrderServices;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $results = $this->order->red($request->value);
 
        $data = [
            'name' => $request->name,
            'product' => $request->value,
            'results' =>  json_encode($results)
        ];

        return redirect()->back()->with('result', $data);
    }
 
}

   
