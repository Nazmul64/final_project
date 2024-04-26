<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
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
      return view('product.create',[
        'active_category'=>Category::where('status','show')->get(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=> 'required',
       ]);
       Product::insert([
        'user_id'=> auth()->id(),
        'category_id'=>$request->category_id,
        'product_name' =>$request->product_name,
        'product_price'=>$request->product_price,
        'short_product_description'=>$request->short_product_description,
        'full_product_description'=>$request->full_product_description,
        'product_code'=>$request->product_code,
        'new' =>$request->new,
        'product_photo'=>"hudei",

       ]);
       return back();
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
