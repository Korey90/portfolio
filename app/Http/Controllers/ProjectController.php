<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technique;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('techniques')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $techniques = Technique::all(); // Fetch all techniques for dropdown
        return view('projects.create', compact('techniques'));
    }

    public function store(Request $request)
    {
      //  dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'technique_ids' => 'required|array', // Array of technique IDs
            'technique_ids.*' => 'exists:techniques,id',
            'end_point' => 'required|string|max:255',
        ]);

        $projectData = $request->except('technique_ids');

        //dd($projectData);
        if ($request->hasFile('image')) {
            $projectData['image'] = $request->file('image')->store('img', 'public');
        }

        $project = Project::create($projectData);
        $project->techniques()->attach($request->input('technique_ids'));
        
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('techniques'); // Eager loading techniques
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $techniques = Technique::all(); // Fetch all techniques for dropdown
        $project->load('techniques'); // Eager loading techniques
        return view('projects.edit', compact('project', 'techniques'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'technique_ids' => 'required|array', // Array of technique IDs
            'technique_ids.*' => 'exists:techniques,id',
        ]);

        $projectData = $request->except('technique_ids');

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
                unlink(storage_path('app/public/' . $project->image));
            }
            $projectData['image'] = $request->file('image')->store('img', 'public');
        }

        $project->update($projectData);
        $project->techniques()->sync($request->input('technique_ids'));

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete image if it exists
        if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
            unlink(storage_path('app/public/' . $project->image));
        }

        $project->techniques()->detach(); // Detach all related techniques
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
