<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProController extends Controller
{
   public function index(){
    $products = Product::all();
    return view('product.index',compact('products'));
   }

   public function create(){
       return view ('product.create');
   }

   public function store(Request $request) {
    $product = new Product;
    $product->title = $request->name;
    $product->description = $request->description;
    $saved = $product->save();
    // dd($saved);ss
    if($saved){
        Session::flash('success','Record has been Added Successfully!');
        

    }
    else {
        Session::flash('error','Something went wrong!');
    }
    
    

    return redirect()->route('pro.index');
    // return redirect()->back();
    }


    public function delete($id)
    {
        // $product = select *from products where id = $id;
        $product = Product::find($id);
        $deleted = $product->delete();

   
    if($deleted){
        Session::flash('success' , 'Record has been deleted Successfully!');
        return redirect()->route("pro.index");
        
    }
    Session::flash("error",'Record has been deleted Successfully');
    return redirect()->route("pro.index");
}



public function edit($id){
  $pro = Product::find($id);
  // dd($todo);
  return view('product.edit', compact('pro'));


}

public function update(Request $request, $id){
  $pro = Product::find($id);
  $pro->title = $request->title;
  $pro->description = $request->description;
  $saved = $pro->save();

  if($saved){
      Session::flash('success','Record has been updated');

  }
  else {
      Session::flash('error','Something went wrong!');
  }
  return redirect()->route('pro.index');
}
}