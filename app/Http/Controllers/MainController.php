<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BlogProduct;
use App\Models\Category;
use App\Models\Menu;
use App\Models\OrderCustomer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{

    public function index()
    {
        $blogproducts = BlogProduct::limit(3)->latest()->get();
        $banners = Banner::all();
        $products = Product::all();
        $menus = Menu::all();
        $moreViews = Product::limit(8)->orderBy('view', 'DESC')->get();
        $latestProducts = Product::limit(3)->latest()->get();
        $topProducts = Product::where('is_spacial', '1')->limit(3)->get();
        $reviewProducts = Product::where('is_spacial', '0')->limit(3)->get();
<<<<<<< HEAD
        return view('index', compact('menus', 'products', 'moreViews', 'latestProducts', 'topProducts', 'reviewProducts', 'banners'));
=======
        return view('index', compact('menus', 'products', 'moreViews', 'latestProducts', 'topProducts', 'reviewProducts','banners','blogproducts'));
>>>>>>> 698725c5295f9cb5e0088fdd8661425f5a513470
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $saleProducts = Product::where('price', '<=', 28000)->get();
        return view('categoryShop', compact('category', 'saleProducts'));
    }


    public function blog()
    {
        return view('blog');
    }
    public function shop()
    {
        $products = Product::paginate(12);
        $saleProducts = Product::where('price', '<=', 28000)->get();
        return view('shop', compact('products', 'saleProducts'));
    }

    public function contact()
    {
        return view('contact');
    }


    public function shopDetails($slug = null)
    {
        $product = Product::where('slug', $slug)->first();
        $otherProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(3)->get();
        return view('shopDetails', compact('product', 'otherProducts'));
    }

    public function shoppingCart()
    {
        return view('shoppingCart');
    }

    public function checkOut()
    {
        return view('checkOut');
    }

    public function blogDetails($id)
    {
        $blogproduct = BlogProduct::where('id',$id)->first();
        return view('blogDetails',compact('blogproduct'));
    }

    public function customerOrder(Request $request, $id)
{
    $product = Product::find($id);
    $selectedProducts = session()->get('selectedProducts', []);

    // Seansda shunga o'xshash mahsulot mavjudligini tekshiring
    $existingProduct = null;
    $existingProductIndex = -1;
    
    foreach ($selectedProducts as $index => $selectedProduct) {
        if ($selectedProduct->product_name === $product->title_uz) {
            $existingProduct = $selectedProduct;
            $existingProductIndex = $index;
            break;
        }
    }

    if ($existingProduct) {
        // Mavjud mahsulot uchun miqdor yoki boshqa tegishli ma'lumotlarni yangilang
        // Masalan: $existingProduct->miqdori += 1;
    } else {
        $cart = new OrderCustomer();
        $cart->price = $product->price;
        $cart->product_name = $product->title_uz;
        $cart->img = $product->multi_img;
        $cart->description_uz = $product->desc_uz;
        $selectedProducts[] = $cart;
        $cart->save();
    }

    session()->put('selectedProducts', $selectedProducts);

    return back();
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
<<<<<<< HEAD
    
}
=======

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('title_uz', 'like', '%' . $query . '%')->get();

        return response()->json(['savat' => $results]);
    }
}
>>>>>>> 698725c5295f9cb5e0088fdd8661425f5a513470
