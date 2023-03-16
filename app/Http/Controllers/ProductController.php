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

        return redirect()->route('products');
    } 

    public function edit($id)
    {
        $catogery = Catogery::latest()->get();
        $data = Product::where('id',$id)->first();
        return view('admin.product.edit',compact('data','catogery'));
    }

    public function update(Request $request,$id)
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

            Session::flash('message', 'Please correct the errors and re-submit');
            Session::flash('alert-class', 'bg-danger');
            
            return redirect()->route('edit_product',$id)->withErrors($validator)->withInput();
        }
        
        $data = Product::find($request->id);
                
        if($request->hasFile('image')){
            // dd($data);
            if(($data->image != "") && file_exists("product_image/".$data->image)){
            // if($data['image'] != ""){                
                unlink("product_image/".$data->image);
            }            
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = 'product_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('product_image'), $filename);
            $data->image = $filename;                        
        }

        if($request->has('name'))
        {
            $data['name'] = ucfirst($request->name);
        }
        if($request->has('discription'))
        {
            $data['discription'] = $request->discription;
        }
        if($request->has('catogery'))
        {
            $data['Catogery_id'] = $request->catogery;
        }
        if($request->has('price'))
        {
            $data['price'] = $request->price;
        }
        $data->save(); 

        return redirect()->route('products')->with(['UP'=> 'pRODUCT Updated successfully.']);
    }

    public function delete($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('products')->with(['RM'=> 'Product removed successfully.']);
    }
    

}
