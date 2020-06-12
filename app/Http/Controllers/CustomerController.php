<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $customers=Customer::where('subsidiary_id',$user->id)->latest()->get();
        return view('sub.customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sub.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->only(
        //     'username',
        //     'address',
        //     'phone_number',
        // );
        $customer=new Customer();
        $customer->username=$request->username;
        $customer->address=$request->address;
        $customer->phone_number=$request->phone_number;
        $customer->subsidiary_id=auth()->user()->id;
        $customer->save();
        return redirect()->route('customer.index')->with('success','add_success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $result=Customer::Find($customer->id);
        return view('sub.customer.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // Customer::update($customer);
        $customer=Customer::Find($customer->id);
        $customer->username=$request->username;
        $customer->address=$request->address;
        $customer->phone_number=$request->phone_number;
        $customer->save();
        return redirect()->route('customer.index')->with('success','update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $products=Product::where('customer_id',$customer->id)->delete();

        Customer::destroy($customer->id);
        return redirect()->back()->with('success','delete_success');
    }
}
