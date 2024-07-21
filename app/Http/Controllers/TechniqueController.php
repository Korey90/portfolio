<?php

namespace App\Http\Controllers;

use App\Models\Technique;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $techniques = Technique::all();
        return view('techniques.index', compact('techniques'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('techniques.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Technique::create($request->all());
        return redirect()->route('techniques.index')->with('success', 'Technique created successfully.');
    }

    // Display the specified resource.
    public function show(Technique $technique)
    {
        return view('techniques.show', compact('technique'));
    }

    // Show the form for editing the specified resource.
    public function edit(Technique $technique)
    {
        return view('techniques.edit', compact('technique'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Technique $technique)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $technique->update($request->all());
        return redirect()->route('techniques.index')->with('success', 'Technique updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Technique $technique)
    {
        $technique->delete();
        return redirect()->route('techniques.index')->with('success', 'Technique deleted successfully.');
    }
}
