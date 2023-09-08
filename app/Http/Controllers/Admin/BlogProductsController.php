<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogProduct;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogproducts = BlogProduct::all();
        return view('admin.blogProducts.index',compact('blogproducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogProducts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/', $image_name);
            $requestData['image'] = $image_name;
        }
        $requestData['slug'] = Str::slug($requestData['name_uz']);
       BlogProduct::create($requestData);
       return redirect()->route('admin.blogProducts.index')->with('success', 'Blog created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogProduct $blogProduct)
    {
        return view('admin.blogProducts.show',compact('blogProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogProduct $blogProduct)
    {
        $categories = Category::all();
        return view('admin.blogProducts.edit',compact('blogProduct','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blogProduct = BlogProduct::findOrFail($id);
        if($request->hasFile('image')){
            if(File::exists('images/'.$blogProduct->image)){
                File::delete('images/'.$blogProduct->image);  
            } 
            $file = $request->file('image');
            $blogProduct->image = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('images/'),$blogProduct->image);
            $request['image']=$blogProduct->image;
        }
        $blogProduct->update([
            "category_id" =>$request->category_id,
            "name_uz" =>$request->name_uz,
            "name_ru" =>$request->name_ru,
            "name_en" =>$request->name_en,
            "body_uz" =>$request->body_uz, 
            "body_ru" =>$request->body_ru, 
            "body_en" =>$request->body_en, 
            "image" =>$blogProduct->image,
        ]);
        $requestData['slug'] = Str::slug($request->name_uz);
        return redirect()->route('admin.blogProducts.index')->with('success','Blogs updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogProduct = BlogProduct::findOrFail($id);

        if(File::exists('images/'.$blogProduct->image)){
            File::delete('images/'.$blogProduct->image);  
        }
        $blogProduct->delete();
        return redirect()->route('admin.blogProducts.index')->with('success','Blogs deleted successfully!');
    }
}
