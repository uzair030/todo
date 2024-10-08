<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Session;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movie.index',compact('movies'));
    }

    public function create (){
        return view('movie.create');
    }  

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:7|max:15',
            'discription' => 'required|min:10|max:50'
    
        ]);

        $movie = Movie::create([
              'title' => $request->title,
         'discription' => $request->discription
        ]);
        // $movie = new Movie;
        // $movie->title = $request->title;
        // $movie->discription = $request->discription;

        // $saved = $movie->save();
        if($movie){
            Session::flash('success','Record has been Added Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('movie.index');
    }

    public function edit($id) {
        $movie = Movie::find($id);
        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, $id) {
        $movie = Movie::find($id);

        $movie->update([
            'title' => $request->title,
            'discription' => $request->discription
      
        ]);

        // $movie->title = $request->title;
        // $movie->discription = $request->discription;

        // $saved = $movie->save();
        if($movie){
            Session::flash('success','Record has been updated Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('movie.index');
    }

    public function delete($id){
        $movie = Movie::find($id);
        // dd($pet);
        $deleted = $movie->delete(); 
      
        if ($deleted){
            Session::flash('success','Record has been deleted successfully');
            return redirect()->route('movie.index');
        }
        Session::flash('error','Something Went Wrong');
        return redirect()->route('movie.index');
    }

}
