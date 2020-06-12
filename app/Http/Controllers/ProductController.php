<?php

namespace App\Http\Controllers;

use App\Product;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $products=Product::where('subsidiary_id',$user->id)->orderBy('updated_at','desc')->get();
        return view('sub.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user();
        $customers=Customer::where('subsidiary_id', $user->id)->get();
        return view('sub.product.add', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->customer_id=$request->customer_id;
        $product->progress=$request->progress;
        $product->status=$request->status;
        $product->subsidiary_id=auth()->user()->id;

        $uiid=Product::max('id');
        $product->unique_key="SB".$product->subsidiary_id."-0000".intval($uiid + 1);



        if($request->photo){
            $imageName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('upload'), $imageName);
            $product->photo='upload/'.$imageName;
        }
        $product->save();
        return redirect()->route('product.index')->with('success','add_success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $user=auth()->user();
        $data['customers']=Customer::where('subsidiary_id', $user->id)->get();
        $data['result']=Product::Find($product->id);
        return view('sub.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product=Product::Find($product->id);
        $product->customer_id=$request->customer_id;
        $product->status=$request->status;
        $product->progress=$request->progress;
        $product->subsidiary_id=auth()->user()->id;
        if($request->photo){
            $imageName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('upload'), $imageName);
            $product->photo='upload/'.$imageName;
        }
        $product->save();
        return redirect()->route('product.index')->with('success','update_success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->back()->with('success','delete_success');
    }
}
