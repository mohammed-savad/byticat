<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        if(session::has('type'))
        {
            $type = Session::get('type');
            if($type == 0)
            {
                Session::flash('message', 'Please correct the errors and re-submit');
                Session::flash('alert-class', 'bg-warning');
            } 
            elseif($type == 1)
            {
            Session::flash('message', 'Your Account is Deactivated. Contact Administrator');
            Session::flash('alert-class', 'bg-danger');
            }
            elseif($type == 2)
            {
            Session::flash('message', 'Signup Completed. Login In To Continue');
            Session::flash('alert-class', 'bg-success');
            }
            elseif($type == 3)
            {
            Session::flash('message', 'Your Email is Not Verified. Verify Email To Continue');
            Session::flash('alert-class', 'bg-success');
            return redirect()->route('admin.otp',Session::get('email'));
            }
            elseif($type == 4)
            {
            Session::flash('message', 'Email id or Password is Incorrect');
            Session::flash('alert-class', 'bg-warning');
            }
            elseif($type == 5)
            {
            Session::flash('message', 'Your password has been successfully updated');
            Session::flash('alert-class', 'bg-success');
            }
            
        }
        return view('admin.login');
    }
    public function dologin(Request $request)
    {
        $rules = array(
            'email'    => 'required|email', 
            'password' => 'required|alphaNum|min:3' 
        );

        
        $validator = Validator::make($request->all(), $rules);

        
        if ($validator->fails()) {
            Session::flash('message', 'Please fill out this fields !.');
            Session::flash('alert-class', 'bg-warning');
            return redirect()->route('admin_login')->withErrors($validator)->withInput();
        } 
        else {

            $credentials = $request->only('email', 'password');

            if (Auth::guard('webadmin')->attempt($credentials)) 
            {
                return redirect()->route('admin_dashboard');
            } 
            else 
            {
                return redirect()->route('admin_login')->withInput()->with('type','4');
            }

        }

    
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function logout()
    {
        Auth::guard('webadmin')->logout();
        return redirect()->route('admin_login');
    }
}
