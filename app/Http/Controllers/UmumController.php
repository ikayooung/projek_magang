<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    public function index(Request $request)
    {
        $customer = (!$request->search) ? Customer::all() : Customer::search($request->search)->get();
        return view('customer.index', compact('customer'));
    }

    public function amplop_besar(Request $request)
    {
        $customer = (!$request->search) ? Customer::all() : Customer::search($request->search)->get();
        return view('customer.amplop-besar', compact('customer'));
    }
}
