<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ForntendController extends Controller
{
   public function forntend(){
       return view('forntend.index',[
        'categories'=>Category::where('status','show')->get(),
        'product'=>Product::all(),
       ]);
   }
}
