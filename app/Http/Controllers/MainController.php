<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
