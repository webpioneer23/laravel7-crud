<?php

function customer_count($id){
  return \App\Customer::where('subsidiary_id', $id)->count();
}
function product_count($id){
  return \App\Product::where('subsidiary_id', $id)->count();
}

function isActive(){
  return "true";
}


function changeDateFormate($date){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date);    
}