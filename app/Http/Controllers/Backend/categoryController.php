<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;
use File;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::orderBy('id','desc')->get();
        return view('Backend.pages.category.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'cat_name'  => 'required|max:255',
        ],
        [
            'cat_name.required'     => 'Please Insert a Category Name',
        ]);

        // Store a Category in DB
        $category = new Category();
        $category->name  = $request->cat_name;
        $category->slug  = Str::slug($request->cat_name);
        $category->save();

  

        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
   
     return view('Backend.pages.category.edit',compact('category'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         // Form Validation
         $request->validate([
            'cat_name'  => 'required|max:255',
        ],
        [
            'cat_name.required'     => 'Please Insert a Category Name',
        ]);

        // Store a Category in DB
      
        $category->name  = $request->cat_name;
        $category->slug  = Str::slug($request->cat_name);
        $category->save();

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       
        if ( !is_null($category) )
        {
            $category->delete();
        }
        return redirect()->route('admin.home');
    }
}
