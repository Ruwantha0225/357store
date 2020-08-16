<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->limit(8)->get();

        return view('pages.index')->with(['products'=>$products]);
    }

    public function admin(){
        return view('pages.admin');
    }
    public function cart(){
        return 'test';
        return view('pages.cart');
    }
    public function checkout(){
        return view('pages.checkout');
    }
    public function shop(){
        return view('pages.shop');
    }
  
    
    
}
