<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductSite extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $products = Todo::all();
            return view('product_admin', compact('products'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
