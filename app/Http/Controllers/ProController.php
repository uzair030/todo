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
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|min:7|max:15',
        'description' => 'required|min:10|max:50'
    ]);

    try {
        // Attempt to create a new product
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        // Check if the product was successfully created
        if ($product) {
            Session::flash('success', 'Record has been added successfully!');
        } else {
            Session::flash('error', 'Something went wrong!');
        }
    } catch (\Exception $e) {
        // Catch any exceptions and flash an error message
        Session::flash('error', 'An error occurred: ');
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
  $pro->update([
        "title" =>$request->title,
        "description" =>$request->description,
  ]);


  if($pro){
      Session::flash('success','Record has been updated');

  }
  else {
      Session::flash('error','Something went wrong!');
  }
  return redirect()->route('pro.index');
}
}