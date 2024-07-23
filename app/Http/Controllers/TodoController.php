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
        $todo = new Todo;
        $todo->name = $request->name;
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

    if ($deleted){
        Session::flash('success', 'Record has been deleted successfully!'); 
        return redirect()->route('todo.index');
    }
    Session::flash('error', 'Something went wrong!'); 
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