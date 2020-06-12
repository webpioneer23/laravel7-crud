<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Customer;
use App\Product;

class HomeController extends Controller
{
    public function index(){
        $customer_count=Customer::count();
        $product_count=Product::count();
        $completed_produt_count=Product::where('status','completed')->count();
        $subsides=User::where('role','!=','superadmin')->get();
        $recent_customers=Customer::latest()->get();
        $recent_products=Product::latest()->get();
        return view('super.index', compact('subsides','customer_count','product_count','completed_produt_count','recent_customers','recent_products'));
    }
}
