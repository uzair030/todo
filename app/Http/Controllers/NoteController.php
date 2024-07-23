<?php

namespace App\Http\Controllers;
use App\Models\note;


use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $note = Note::all();
        return view('note.index',compact('note'));
    }
}
