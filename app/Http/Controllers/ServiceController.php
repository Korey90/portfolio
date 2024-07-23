<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
        ]);

        $serviceData = $request->except('image');

        if ($request->hasFile('image')) {
            $serviceData['image'] = $request->file('image')->store('images', 'public');
        }

        Service::create($serviceData);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',

        ]);

        $serviceData = $request->except('image');

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }
            $serviceData['image'] = $request->file('image')->store('images', 'public');
        }

        $service->update($serviceData);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::delete('public/' . $service->image);
        }
        
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
