<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;

class WelcomeController extends Controller
{
    public function index(){

        $skills = Skill::orderBy('name', 'asc')->get();
        $projects = Project::with('techniques')->get();
        $services = Service::all();
        return view('welcome', ['skills' => $skills, 'projects' => $projects, 'services' => $services]);

    }
}
