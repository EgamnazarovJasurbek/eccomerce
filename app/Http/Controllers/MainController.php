<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    // public function categoryProducts($slug)
    // {
    //     return view('categoryProducts');
    // }


    public function shopGrid()
    {
        return view('shopGrid');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function shopDetails()
    {
        return view('shopDetails');
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
        // $ppp = Category:();
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
