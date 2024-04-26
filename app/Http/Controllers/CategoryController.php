<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('category.index',[
            'categories' => Category::all(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('category.create',[
        'categories'=>Category::all(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_tagline' => 'required',
            'category_photo' => 'required',
        ]);
        $file = $request->file('category_photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = "uploads/category_photos";
        $file->move($path, $filename);
        Category::insert([
            'category_name'=>$request['category_name'],
            'category_tagline' => $request['category_tagline'],
            'category_photo' => $filename,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('insert','Data insert successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        return view('category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $categories =Category::find($id);
       return view('category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->hasFile('new_category_photo')){
          unlink('uploads/category_photos/'.Category::find($id)->category_photo);
        }
        $file = $request->file('new_category_photo');
        $new_category_photo = time() . '.' . $file->getClientOriginalExtension();
        $path = 'uploads/category_photos';
        $request->new_category_photo->move($path, $new_category_photo);
        Category::find($id)->update([
            'category_photo' => $new_category_photo
        ]);
        Category::find($id)->update([
            'category_name' => $request['category_name'],
            'category_tagline' => $request['category_tagline'],
            'status'=>$request['status'],

        ]);
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $category =Category::find($id);
     unlink('uploads/category_photos/'. $category->category_photo);
        $category->delete();
        return back();
    }
}
