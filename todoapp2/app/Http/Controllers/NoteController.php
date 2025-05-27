<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Notes;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $notes = Notes::where('status', 'pending')->get();
    $count = Notes::where('status', 'pending')->count();
    return view('index', compact('notes', 'count'));
}

public function accomplished()
{
    $notes = Notes::where('status', 'finished')->get();
    $count = Notes::where('status', 'finished')->count();
    return view('accomplished', compact('notes', 'count'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $notes  = new Notes();
    $notes->title = $request->input('title');
    $notes->description = $request->input('description');
    $notes->date = $request->input('date');
    $notes->list = $request->input('list');
    $notes->status = $request->input('status') ?? 'pending';
    $notes->save();

    return redirect()->route('Notes.index')->with('success', 'Note created successfully!');

        // $notes  = new Notes();
        // $notes->title = 'test';
        // $notes->description = 'test 2';
        // $notes->date = '2025-05-25';
        // $notes->list = '🎨';
        // $notes->status = 'pending';

       

        // // Redirect back to the index page with a success message
        // return redirect()->route('Notes.index')->with('success', 'Note created successfully!');
    }

public function finished(Request $request, string $id)
{   
     $notes = Notes::find($id);
    if ($notes) {
        $notes->status = 'finished';
        $notes->save();
        return redirect()->route('Notes.index')->with('success', 'Note marked as finished successfully!');
    } else {
        return redirect()->route('Notes.index')->with('error', 'Note not found.');
    }

 return redirect()->route('Notes.index')->with('success', 'Note marked as finished successfully!');
}

public function delete(Request $request, string $id)
{
    $notes = Notes::find($id);
    if ($notes) {
        $notes->delete();
        return redirect()->route('Notes.index')->with('success', 'Note deleted successfully!');
    } else {
        return redirect()->route('Notes.index')->with('error', 'Note not found.');
    }
    return redirect()->route('Notes.index')->with('success', 'Note deleted successfully!');
}

public function update(Request $request, string $id){
    $notes = Notes::find($id);
    if ($notes) {
        $notes->title = $request->input('title');
        $notes->description = $request->input('description');
        $notes->date = $request->input('date');
        $notes->list = $request->input('list');
        $notes->status = $request->input('status') ?? 'pending';
        $notes->save();
        return redirect()->route('Notes.index')->with('success', 'Note updated successfully!');
    } else {
        return redirect()->route('Notes.index')->with('error', 'Note not found.');
    }
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
