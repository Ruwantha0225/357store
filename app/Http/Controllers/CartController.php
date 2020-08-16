<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $prod_id = $request->prod_id;
        $user_id = Auth::user()->id;

        // If user has an unchecked out cart
        $cart = Cart::where([ ['cus_id', '=', $user_id], ['checked_out', '=', '0'] ])->first();
        $product = Product::find($prod_id);
        
        // Adding items to cart
        if($prod_id) {
            if(!$cart) {
                $cart = new Cart();
                $cart->cus_id = $user_id;
                $prod_to_save = [
                    $prod_id => [
                        $product->price,    // unit price
                        1                   // amount
                    ]
                ];
                $cart->products = json_encode($prod_to_save);
                $cart->owner_id = $product->admin;
                $cart->save();
            } else {
                $prod_to_save = json_decode($cart->products);
                if(property_exists($prod_to_save, $prod_id)) {
                    $prod_to_save->{$prod_id}[1] += 1;
                    $cart->products = json_encode($prod_to_save);
                    $cart->save();
                } else {
                    $prod_to_save = json_decode((json_encode($prod_to_save)), true);
                    $prod_to_save[$prod_id] = [
                        $product->price,
                        1
                    ];
                    $cart->products = json_encode($prod_to_save);
                    $cart->owner_id = $product->admin;
                    $cart->save();
                }
            }
        }

        if($cart) {
            // Making data to send to view
            $prod_to_save = json_decode($cart->products, true);
            $prod_ids = array_keys($prod_to_save);
            $products_to_view = Product::whereIn('id', $prod_ids)->get();
            $total = 0;
            
            foreach($products_to_view as $product_to_view) {
                $product_to_view['amount'] = $prod_to_save[$product_to_view->id][1];
                $total += $product_to_view->price * $product_to_view->amount;
            }
            return view('cart.index')->with(['products'=>$products_to_view, 'total' => $total]);
        } else {
            return view('cart.noItems');
        }        
    }

    public function checkout(Request $request) {
        $cart = Cart::where([['cus_id', auth()->user()->id], ['checked_out', 0]])->first();
        $cart->address = $request->address;
        $cart->checked_out = 1;
        $cart->save();

        return redirect('/');
    }
}
