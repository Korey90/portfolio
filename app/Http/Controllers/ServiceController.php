<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Http\Request;

use App;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::with('translations')->get(); 

        return view('services.index', compact('services'));
    }

    public function show(Service $service){
        return view('services.show', compact('service'));
    }
        
    public function create(){
        return view('services.create');
    }
    
    public function store(Request $request){
        // Walidacja danych podstawowych
        $request->validate([
            'slug' => 'required|string|max:255|unique:services',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'translations' => 'required|array',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.description' => 'required|string',
        ]);

        // Dane podstawowe usługi
        $serviceData = $request->only(['slug', 'min_price', 'max_price', 'image']);
        if ($request->hasFile('image')) {
            $serviceData['image'] = $request->file('image')->store('images', 'public');
        }

        // Tworzenie nowej usługi
        $service = Service::create($serviceData);

        // Przetwarzanie tłumaczeń
        foreach ($request->input('translations') as $locale => $translation) {
            $translationData = [
                'service_id' => $service->id,
                'locale' => $locale,
                'title' => $translation['title'],
                'description' => $translation['description'],
            ];
            ServiceTranslation::create($translationData);
        }
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service){
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id){
        // Walidacja danych podstawowych
        $request->validate([
            'slug' => 'required|string|max:255|unique:services,slug,' . $id,
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'translations' => 'required|array',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.description' => 'required|string',
        ]);
    
        // Znajdź istniejącą usługę
        $service = Service::findOrFail($id);
    
        // Dane podstawowe usługi
        $serviceData = $request->only(['slug', 'min_price', 'max_price', 'image']);

        if ($request->hasFile('image')) {
            // Usunięcie starego obrazu, jeśli istnieje
            if ($service->image) {
                $imagePath = public_path('storage/' . $service->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $serviceData['image'] = $request->file('image')->store('images', 'public');
        }
    
        // Aktualizacja usługi
        $service->update($serviceData);
    
        // Przetwarzanie tłumaczeń
        foreach ($request->input('translations') as $locale => $translation) {
            $translationData = [
                'service_id' => $service->id,
                'locale' => $locale,
                'title' => $translation['title'],
                'description' => $translation['description'],
            ];
    
            // Aktualizacja istniejącego tłumaczenia lub utworzenie nowego
            ServiceTranslation::updateOrCreate(
                ['service_id' => $service->id, 'locale' => $locale],
                $translationData
            );
        }
    
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
    
    public function destroy($id){
        // Znajdź istniejącą usługę
        $service = Service::findOrFail($id);
    
        // Usunięcie obrazu, jeśli istnieje
        if ($service->image) {
            $imagePath = public_path('storage/' . $service->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Usunięcie tłumaczeń powiązanych z usługą
        ServiceTranslation::where('service_id', $service->id)->delete();
    
        // Usunięcie usługi
        $service->delete();
    
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
    
}


