<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\Category;

use Parsedown;

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

        $locale = app()->getLocale();

        // Dynamiczne określenie kolumn na podstawie lokalizacji
        $titleColumn = 'title_' . $locale;
        $descriptionColumn = 'description_' . $locale;
        $contentColumn = 'content_' . $locale;

        // Pobranie postów z dynamicznie wybranymi kolumnami
        $posts = Post::select('id', $titleColumn . ' as title', $descriptionColumn . ' as description', $contentColumn . ' as content', 'slug', 'image', 'category_id', 'created_at', 'updated_at')
            ->where('active', 1)
            ->get();

        $categories = Category::all();

        return view('blog', ['posts' => $posts, 'categories' => $categories]);
    }

    public function post($slug){
        $parsedown = new Parsedown();
        //$post->content = $parsedown->text($post->content);

        $locale = app()->getLocale();

        // Dynamiczne określenie kolumn na podstawie lokalizacji
        $titleColumn = 'title_' . $locale;
        $descriptionColumn = 'description_' . $locale;
        $contentColumn = 'content_' . $locale;

      //  $post = Post::where('slug', $slug)->firstOrFail();
        $post = Post::select('id', $titleColumn . ' as title', $descriptionColumn . ' as description', $contentColumn . ' as content', 'slug', 'image', 'category_id', 'created_at', 'updated_at')
        ->where('slug', $slug)
        ->firstOrFail();
        //dd($post);

       $post->content = $parsedown->text($post->content);


        return view('post', ['post' => $post]);

    }
}
