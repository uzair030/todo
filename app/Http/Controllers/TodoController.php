<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Session;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
        // return view('todos.index')->with(['todo' => $todos]);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:5|max:20',
            'discription' =>'required|min:10|max:30'
        ]);
        $todo = new Todo;
        $todo->name = $request->name;
        $todo->discription = $request->discription;
        $saved = $todo->save();
        
        if($saved){
            Session::flash('success','Record has been Added Successfully!');
            
            
        }
        else {
            Session::flash('error','Something went wrong!');
        }

        return redirect()->route('todo.index');
        // return redirect()->back();
    }

public function delete($id){
    $todo = Todo::find($id);
    $deleted = $todo->delete();

    return redirect()->route('todo.index');
}

    public function edit($id){
        $todo = Todo::find($id);
        // dd($todo);
        return view('todos.edit', compact('todo'));


    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->discription = $request->discription;
        $saved = $todo->save();

        if($saved){
            Session::flash('success','Record has been updated');

        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('todo.index');
    }
}