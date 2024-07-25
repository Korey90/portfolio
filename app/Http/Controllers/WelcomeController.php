<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index(){

        $skills = Skill::orderBy('name', 'asc')->get();
        $projects = Project::with('techniques')->get();
        $services = Service::all();
        return view('welcome', ['skills' => $skills, 'projects' => $projects, 'services' => $services]);

    }


    public function service($title){
        $title = str_replace('-', ' ', $title);
        //dd($title);
        $service = Service::where('title', $title)->firstOrFail();
        return view('service', ['service' => $service]);
    }

    public function blog(){
        $posts = Post::all();
        $categories = Category::all();

        return view('blog', ['posts' => $posts, 'categories' => $categories]);
    }

    public function post($title){
        $title = str_replace('-', ' ', $title);

        $post = Post::where('title', $title)->firstOrFail();

        return view('post', ['post' => $post]);

    }
}
