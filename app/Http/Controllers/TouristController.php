<?php

namespace App\Http\Controllers;
use App\Models\Tourist;
use Session;

use Illuminate\Http\Request;

class TouristController extends Controller
{
    public function index(){
        $tours = Tourist::all();
        return view('tour.index',compact('tours'));
    }

    public function create(){
        return view('tour.create');
    }


    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'costing' => 'required'
        ]);

        try {
            $tour = Tourist::create([
                'name' => $request->name,
                'visa_category' => $request->visa_category,
                'country' => $request->country,
                'costing' => $request->costing
            ]);
            
            if($tour){
                Session::flash('success','Record has been Added Successfully!');
                
                
            }
            else {
                Session::flash('error','Something went wrong!');
            }
        } catch(\Exception $ex) {
            Session::flash('error','Something went wrong!');
        }
       

        return redirect()->route('tour.index');
        // return redirect()->back();
    }

    public function delete($id){
        $tour = Tourist::find($id);
        $deleted = $tour->delete();
    
        if ($deleted){
            Session::flash('success', 'Record has been deleted successfully!'); 
            return redirect()->route('tour.index');
        }
        Session::flash('error', 'Something went wrong!'); 
        return redirect()->route('tour.index');
    }

    public function edit($id){
        $tour =Tourist::find($id);
        // dd($todo);
        return view('tour.edit', compact('tour'));
      
      
      }

      
public function update(Request $request, $id){

    $tour = Tourist::find($id);
    
    $saved = $tour->update([
        'name' => $request->name,
        'visa_category' => $request->visa_category,
        'country' => $request->country,
        'costing' => $request->costing,
    ]);
  
    if($saved){
        Session::flash('success','Record has been updated');
  
    }
    else {
        Session::flash('error','Something went wrong!');
    }
    return redirect()->route('tour.index');
  }
}
