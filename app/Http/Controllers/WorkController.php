<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Work;
use App\Models\WorkProcess;

class WorkController extends Controller
{
    public function index(){

    }

    public function create(){
        $services = Service::all();
        $locales = config('app.locales');
        return view('works.create', ['services' => $services, 'locales' => $locales]);
    }

    public function store(Request $request){
        // Walidacja danych podstawowych
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'details' => 'nullable|string',
            'service_id' => 'required|int',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'locale' => 'in:pl,en,pt',
            'service_intervals' => 'required|array',  // Poprawione bez []
            'service_intervals.*' => 'in:one-time,monthly',  // Dodana walidacja dla każdego elementu tablicy
        ]);

        $workData = $request->only(['title', 'description', 'details', 'service_id', 'min_price', 'max_price', 'locale', 'service_intervals']);

        $newWork = Work::create($workData);


        return redirect()->route('works.create')->with('success', 'Work created successfully.');

        
    }
}
