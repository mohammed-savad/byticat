<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function grid()
    {
        return view('admin.customer.grid');
    }
}
