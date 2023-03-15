<?php

namespace App\Http\Controllers;
use App\Models\Catogery;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CatogeryController extends Controller
{
    public function grid()
    {
        $catogery = Catogery::latest()->get();
        return view('admin.catogery.grid',compact('catogery'));
    }

    public function add()
    {
        return view('admin.catogery.add');
    }

    function store(Request $request)
    {
        $rules = [
             
            'name' => 'required',
            'image' => 'required',
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
            
        ];

       $catogery = Catogery::create($data);

        $lastId = $catogery->id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = 'catogery_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('cat_imgs'), $filename);

            $data = Catogery::find($lastId);
            $data->image = $filename;
            $data->save();
        }

        return redirect('catogeries');
    } 
    
    public function edit($id)
    {
        $data = Catogery::where('id',$id)->first();
        return view('admin.catogery.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $rules = [
             
            'name' => 'required',
            'discription' => 'required',
            
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {

            Session::flash('message', 'Please correct the errors and re-submit');
            Session::flash('alert-class', 'bg-danger');
            
            return redirect()->route('edit_catogery',$id)->withErrors($validator)->withInput();
        }
        
        $data = Catogery::find($request->id);
                
        if($request->hasFile('image')){
            // dd($data);
            if(($data->image != "") && file_exists("cat_imgs/".$data->image)){
            // if($data['image'] != ""){                
                unlink("cat_imgs/".$data->image);
            }            
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = 'catogery_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('cat_imgs'), $filename);
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
        $data->save(); 

        return redirect()->route('catogeries')->with(['UP'=> 'Catogery Updated successfully.']);
    }
    
    public function delete($id)
    {
        Catogery::where('id',$id)->delete();
        return redirect()->route('catogeries')->with(['RM'=> 'Catogery removed successfully.']);
    }

    public function View($id)
    {
        $product = Product::latest()->get();
        $catogery_id = Catogery::where('id',$id)->first();
        return view('admin.product.view',compact('catogery_id','product'));
    }

}
