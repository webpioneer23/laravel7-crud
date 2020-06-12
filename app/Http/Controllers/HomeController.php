<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Product;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=auth()->user();
        if($user->role == 'superadmin'){
            return redirect()->route('super.index');
        }else{
         
            return redirect()->route('sub.index');
        }
        return view('home');
    }

    public function sub_index(){
        $user=auth()->user();
        $customer_count=Customer::where('subsidiary_id',$user->id)->count();
        $product_count=Product::where('subsidiary_id',$user->id)->count();
        $completed_produt_count=Product::where('status','completed')->where('subsidiary_id',$user->id)->count();
        $recent_customers=Customer::where('subsidiary_id',$user->id)->latest()->get();
        $recent_products=Product::where('subsidiary_id',$user->id)->latest()->get();
        return view('sub.index', compact('customer_count','product_count','completed_produt_count','recent_customers','recent_products'));
    }

    public function pdf($id){
        // $show = Disneyplus::find($id);
        $result=Product::Find($id);
        $pdf = PDF::loadView('file/pdf',compact('result'));
        
        // return view('file/pdf', compact('result'));
        return $pdf->download('pdf.pdf');
    }

    public function fix(){
        // $products=Product::with('customer')->get();
        // foreach ($products as $key => $value) {
        //     if($value->customer){
        //         $value->subsidiary_id=$value->customer->subsidiary_id;
        //     $value->save();

        //     }else{
        //         $value->delete();
        //     }
        // }

        $products=Product::all();
        foreach ($products as $key => $value) {
            $id_len=strlen(strval($value->id));
            return $id_len;
            // if(strlen(strval($value->id)))
            $value->unique_key="SB".$value->subsidiary_id."-0000".intval($value->id + 1);
            $value->save();
        }
        return "success";
    }

}
