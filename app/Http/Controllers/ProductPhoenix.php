<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductPhoenix extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(5);
        return view('product_admin',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'datetime_start' => 'required',
            'datetime_stop' => 'required',
            'type' => 'required',
            'country' => 'required',
            'valute' => 'required',
            'period_job' => 'required',
            'prob_period' => 'required',
            'prob_price' => 'required',
            'datetime_start_sell' => 'required',
            'price' => 'required',
            'old_price' => 'required',
            'datetime_start_access' => 'required',
            'datetime_stop_access' => 'required',
            'datetime_stop_sell' => 'required',
            'img_main' => 'required',
            'img_banner' => 'required',
            'img_video_promo' => 'required',
            'video_promo' => 'required',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
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
