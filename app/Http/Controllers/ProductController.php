<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Admin;
use Auth;
use Session;

class ProductController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:admin', ['except' => [ 'list', 'show' ]]);
    // }

    public function index() {
        $products = Product::where('admin', Auth::user()->id)->get();

        return view('product.list')->with('products', $products);
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->admin = Auth::user()->id;
        $fileNameToStore = '';

        if($request->hasFile('img')) {
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('img')->storeAs('public/images/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }
        $product->img = $fileNameToStore;

        $product->save();
        return redirect()->route('product.list');
    }

    public function show($id) {
        $product = Product::find($id);
        $admin = Admin::find($product->admin);

        return view('product.view')->with(['product' => $product, 'admin' => $admin]);
    }

    public function edit($id) {
        $product = Product::find($id);

        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->name = $request->name ? $request->name : $product->name;
        $product->description = $request->desc ? $request->desc : $product->description;
        $product->price = $request->price ? $request->price : $product->price;
        $product->admin = Auth::user()->id;
        $fileNameToStore = '';

        if($request->hasFile('img')) {
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('img')->storeAs('public/images/products', $fileNameToStore);
        } else {
            $fileNameToStore = $product->img;
        }
        $product->img = $fileNameToStore;

        $product->save();
        return redirect()->route('product.list');
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.list');
    }

    public function list(Request $request) {
        $products = [];
        if($request->search) {
            $search = $request->search;
            $products = Product::where([['name', 'like', '%'.$search.'%']])->orWhere([['description', 'like', '%'.$search.'%']])->get();
        } else {
            $products = Product::all();
        }
        return view('product.list')->with('products', $products);
    }
}
