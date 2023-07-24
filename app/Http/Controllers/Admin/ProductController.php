<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '' . $file->getClientOriginalName();
            $file->move('Products/image/', $imageName);
            $requestData['image'] = $imageName;
        };


        
        $request->validate([
            'multi_img' => 'required|array',
            'multi_img.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('multi_img')) {
            foreach ($request->file('multi_img') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
    
                // Faylni saqlash
                $file->move(public_path('multiImg'), $imageName);
    
                // Fayl nomini Product modeliga saqlash uchun qo'shish
                $product = new Product();
                $product->multi_img = $imageName;
                $product->save();
            }
        }
        



        $requestData['slug'] = \Str::slug($request->title_uz);

        Product::create($requestData);
        return redirect()->route('admin.products.index')->with('success', "Mahsulot qo'shildi✔️");
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
