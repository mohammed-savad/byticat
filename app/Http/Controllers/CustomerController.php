<?php

namespace App\Http\Controllers;
use App\Models\Catogery;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $product = Product::latest()->take(9)->get();
        return view('dashboard',compact('product'));
    }

    public function products()
    {
        $product = Product::latest()->get();
        return view('user.all_product',compact('product'));
    }

    public function cust_catogery()
    {
        $catogery = Catogery::latest()->get();
        return view('user.catogery',compact('catogery'));
    }

    public function catogery_product($id)
    {
        $product = Product::latest()->get();
        $catogery_id = Catogery::where('id',$id)->first();
        return view('user.product',compact('catogery_id','product'));
    }


}
