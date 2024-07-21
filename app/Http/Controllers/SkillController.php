<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $skills = Skill::orderBy('created_at', 'desc')->get();
        
        return view('skills.index', compact('skills'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('skills.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        Skill::create($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill created successfully.');
    }

    // Display the specified resource.
    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }

    // Show the form for editing the specified resource.
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        $skill->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully.');
    }
}
