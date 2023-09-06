<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
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
            $file->move('site/images/', $image_name);
            $requestData['image'] = $image_name;
        }
        
       Banner::create($requestData);
       return redirect()->route('admin.banners.index')->with('success', 'Banner created succuessfuly');
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
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        if($request->hasFile('image')){
            if(File::exists('site/images/'.$banner->image)){
                File::delete('site/images/'.$banner->image);  
            } 
            $file = $request->file('image');
            $banner->image = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('site/images/'),$banner->image);
            $request['image']=$banner->image;
        }
        $banner->update([
            "name_uz" =>$request->name_uz,
            "name_ru" =>$request->name_ru,
            "name_en" =>$request->name_en,
            "body_uz" =>$request->body_uz, 
            "body_ru" =>$request->body_ru, 
            "body_en" =>$request->body_en, 
            "image" =>$banner->image,
        ]);
        return redirect()->route('admin.banners.index')->with('success','Banners updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banners = Banner::findOrFail($id);

        if(File::exists('site/images/'.$banners->image)){
            File::delete('site/images/'.$banners->image);  
        }
        $banners->delete();
        return redirect()->route('admin.banners.index')->with('success','Banner deleted successfully!');
    }
}
