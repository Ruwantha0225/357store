<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;

class AdminController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:admin');
    // }

    public function index() {
        if(!Auth::user()->is_admin) {
            return redirect('/');
        }
        $sellings = Cart::where('checked_out', 1)->orderBy('updated_at', 'desc')->get();
        return view('admin.index')->with('sellings', $sellings);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
