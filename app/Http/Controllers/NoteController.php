<?php

namespace App\Http\Controllers;
use App\Models\note;
use Illuminate\Http\Request;
use Session;

class NoteController extends Controller
{
    public function index (){
        $notes = Note::all();
    
        return view ('note.index', compact('notes'));
    }

    public function create (){
        return view('note.create');
    }  

    public function store(Request $request) {

        // $saved = Note::create([
        //     'note' => $request->note
        // ]);
        $request->validate([
            'note' => 'required|min:10|max:30'
        ]);

        $note =Note::create([
          'note' => $request->note
        ]);

        // $note = new Note;
        // $note->note = $request->note;
        // $saved =$note->save();


        if($note){
            Session::flash('success','Record has been Added Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('note.index');
    }

    public function edit($id) {
        $note = Note::find($id);

        return view('note.edit', compact('note'));
    }

    public function update(Request $request, $id) {
        $note = Note::find($id);

        $note->update([
            'note' => $request->note
        ]);

        if($note){
            Session::flash('success','Record has been updated Successfully!');
        }
        else {
            Session::flash('error','Something went wrong!');
        }
        return redirect()->route('note.index');
    }

    public function delete($id){
        $note = Note::find($id);
        // dd($pet);
        $deleted = $note->delete(); 
      
        if ($deleted){
            Session::flash('success','Record has been deleted successfully');
            return redirect()->route('note.index');
        }
        Session::flash('error','Something Went Wrong');
        return redirect()->route('note.index');
    }
}
