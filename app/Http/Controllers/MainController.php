<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $menus = Menu::all();

        $moreViews = Product::limit(8)->orderBy('view', 'DESC')->get();
        $latestProducts = Product::limit(3)->latest()->get();
        $topProducts = Product::where('is_spacial', '1')->limit(3)->get();
        $reviewProducts = Product::where('is_spacial', '0')->limit(3)->get();
        return view('index', compact('menus', 'products', 'moreViews', 'latestProducts', 'topProducts', 'reviewProducts'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categoryShop', compact('category'));
    }


    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function shopDetails(Product $product)
    {
        dd($product);
        // $product = Product::where('slug', $slug)->first();
    
        return view('shopDetails', compact('product'));
    }

    public function shoppingCart()
    {
        return view('shoppingCart');
    }

    public function checkOut()
    {
        return view('checkOut');
    }

    public function blogDetails()
    {
        return view('blogDetails');
    }

    public function bot($method, $params = [])
    {
        $url = 'https://api.telegram.org/bot' . config('services.telegram.token') . '/' . $method;
        $data = Http::post($url, $params);
        return $data->json();
    }

    public function send_massage(Request $request)
    {

        $this->bot('sendMessage', [
            'chat_id' => -1001754275733,
            'text' => "😆 Name: $request->name\n😆 Email: $request->email\n😆 Text: $request->message",
        ]);

        return back();
    }
}
