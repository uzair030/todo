<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Session;
class PetController extends Controller
{
  public function index (){
    $pets = Pet::all();

    return view ('pet.index', compact('pets'));
  }

 public function create (){
  return view('pet.create');
 }  


 public function store(Request $request) {
    $pet = new Pet;
    $pet->title = $request->name;
    $pet->save();
    $saved = $pet->save();
    if($saved){
        Session::flash('success','Record has been Added Successfully!');
    }
    else {
        Session::flash('error','Something went wrong!');
    }
    return redirect()->route('pet.index');
    // return redirect()->back();
}
//  public function store(Request $request) {
//     $pet = new pet;
//     $pet->string = $request->name;
//     $pet->save();

//     return redirect()->route('home');
//     // return redirect()->back();
// }

public function delete($id){
  
  $pet = Pet::find($id);
  // dd($pet);
  $deleted = $pet->delete(); 

if ($deleted){
  Session::flash('success','Record has been deleted successfully');
  return redirect()->route('pet.index');
}
Session::flash('error','Something Went Wrong');
return redirect()->route('pet.index');
}
 



public function edit($id){
  $pet = Pet::find($id);
  // dd($todo);
  return view('pet.edit', compact('pet'));


}

public function update(Request $request, $id){
  $pet = Pet::find($id);
  $pet->title = $request->title;
  $saved = $pet->save();

  if($saved){
      Session::flash('success','Record has been updated');

  }
  else {
      Session::flash('error','Something went wrong!');
  }
  return redirect()->route('pet.index');
}
}
