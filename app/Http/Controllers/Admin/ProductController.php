<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('Products/image/', $imageName);
            $requestData['image'] = $imageName;
        }


        $requestData['slug'] = Str::slug($requestData['title_uz']);

        $product = new Product();
        $product->storeProduct($requestData);

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
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Eski rasmlarning manzillarini ma'lumotlar omboridan olamiz
        $oldImages = explode('|', $product->multi_img);

        // Agar so'rovda "multi_img" nomli yangi rasmlar bo'lsa
        if ($request->hasFile('multi_img')) {
            $images = [];
            foreach ($request->file('multi_img') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('Products/image/', $name);
                $images[] = $name;
            }

            // Eski rasmlarni o'chirish
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('Products/image/' . $oldImage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $data['multi_img'] = implode('|', $images);
        } else {
            // Agar yangi rasmlar yuklanmagan bo'lsa, eski rasmlarning manzillarini saqlashimiz kerak
            $data['multi_img'] = $product->multi_img;
        }

        // Yangi ma'lumotlar bilan mahsulotni yangilaymiz
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', "Tahrirlandi");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
