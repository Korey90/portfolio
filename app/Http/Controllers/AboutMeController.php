<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutMe;

use App;

class AboutMeController extends Controller
{
    protected $currentLocale;

    public function __construct(){
        $this->currentLocale = App::getLocale(); // Przypisz do właściwości klasy
    }

    public function index(){
        $aboutMe = AboutMe::all();
        return view('about-me.index', compact('aboutMe'));
    }

    public function show(AboutMe $aboutMe){
        return 'show';
    }

    public function create(){
        return view('about-me.create');
    }

    public function store(Request $request){
        // Walidacja danych podstawowych
        $request->validate([
            'locale' => 'required|string|max:3',
            'content' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',//5mb
        ]);

        $formData = $request->only(['locale', 'content', 'photo']);

        if ($request->hasFile('photo')) {
            $formData['photo'] = $request->file('photo')->store('images', 'public');
        }

        $aboutMe = AboutMe::create($formData);

        return redirect()->route('about-me.index')->with('success', 'Service created successfully.');
    }

    public function edit(AboutMe $aboutMe){
        return 'edit form here';
    }

    public function update(Request $request, $id){
        return 'update here';
    }

    public function destroy($id){
        return 'usuwanie tutaj';
    }




}
