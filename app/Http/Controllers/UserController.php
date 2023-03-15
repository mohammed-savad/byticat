<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function grid()
    {
        $user = Admin::latest()->get();
        return view('admin.user.grid',compact('user'));
    }
    public function add()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        
        // dd($request);
        $rules = [
             
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:5',
            'role' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            // dd('fails');

            Session::flash('message', 'Please correct the errors and re-submit');
            Session::flash('alert-class', 'bg-danger');

            return redirect()->back()->withErrors($validator);
        }
        // dd('Success');
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
            
        ];
       
        Admin::create($data);
        return redirect()->route('users')->with(['AD'=> 'User added successfully...']);
    }

    public function edit($id)
    {
        $data = Admin::where('id',$id)->first();
        return view('admin.user.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $rules = array( 
            'name' => 'required',
            'role' => 'required',
        );
                
        $validator = Validator::make($request->all(), $rules);
       
        if ($validator->fails()) {
            
            Session::flash('message', 'Please correct the errors and re-submit');
            Session::flash('alert-class', 'bg-warning');
            return redirect()->route('edit_users',$id)->withErrors($validator)->withInput();
        }
             
        
        $data = [
            'name' => $request->name,
            'role' => $request->role,
        ];
       
        Admin::where('id',$id)->update($data);
        return redirect()->route('users')->with('UP', 'User updated successfully.');
    }
    public function delete($id)
    {
        Admin::where('id',$id)->delete();
        return redirect()->route('users')->with(['RM'=> 'User removed successfully.']);
    }
}
