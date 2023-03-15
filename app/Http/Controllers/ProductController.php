<?php

namespace App\Http\Controllers;
use App\Models\Catogery;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function grid()
    {
        $product = Product::latest()->get();
        return view('admin.product.grid',compact('product'));
    }
    public function add()
    {
        $catogery = Catogery::latest()->get();
        return view('admin.product.add',compact('catogery'));
    }

    function store(Request $request)
    {
        $rules = [
             
            'name' => 'required',
            'image' => 'required',
            'discription' => 'required',
            'catogery' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            // dd('fails');

            Session::flash('message', 'Please correct the errors and re-submit');
            Session::flash('alert-class', 'bg-danger');

            return redirect()->back()->withErrors($validator);
        }


        $data = [
            'name' => $request->name,
            'discription' =>$request->discription,
            'Catogery_id' =>$request->catogery,
            'price' =>$request->price,
            
        ];

       $product = Product::create($data);

        $lastId = $product->id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = 'product_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('product_image'), $filename);

            $data = Product::find($lastId);
            $data->image = $filename;
            $data->save();
        }

        return redirect('products');
    } 
}
