<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\AboutMe;
use App\Models\Category;

use App;
use Parsedown;

class WelcomeController extends Controller
{
    protected $currentLocale;

    public function __construct(){
        $this->currentLocale = App::getLocale(); // Przypisz do właściwości klasy
    }

    public function index(){

        $currentLocale = $this->currentLocale;

        $skills = Skill::orderBy('name', 'asc')->get();
        $projects = Project::with('techniques')->get();
        $aboutMe = AboutMe::where('locale', $currentLocale)->firstOrFail();

        $services = Service::with(['translations' => function ($query) use ($currentLocale) {
            $query->where('locale', $currentLocale)
                  ->orWhere('locale', 'default');
        }])->get();
        
        return view('welcome', [
            'skills' => $skills, 
            'projects' => $projects, 
            'services' => $services,
            'aboutMe' => $aboutMe,
        ]);

    }


    public function service($slug){
        $currentLocale = $this->currentLocale;
        $service = Service::where('slug', $slug)->with(['translations' => function ($query) use ($currentLocale) {
            $query->where('locale', $currentLocale)
                  ->orWhere('locale', 'default');
        }])->firstOrFail();

        return view('service', ['service' => $service]);
    }

    public function blog(){
        $currentLocale = $this->currentLocale;

        // Dynamiczne określenie kolumn na podstawie lokalizacji
        $titleColumn = 'title_' . $currentLocale;
        $descriptionColumn = 'description_' . $currentLocale;
        $contentColumn = 'content_' . $currentLocale;

        // Pobranie postów z dynamicznie wybranymi kolumnami
        $posts = Post::select('id', $titleColumn . ' as title', $descriptionColumn . ' as description', $contentColumn . ' as content', 'slug', 'image', 'category_id', 'created_at', 'updated_at')
            ->where('active', 1)
            ->get();

        $categories = Category::all();

        return view('blog', ['posts' => $posts, 'categories' => $categories]);
    }

    public function post($slug){
        $parsedown = new Parsedown();

        $currentLocale = $this->currentLocale;

        // Dynamiczne określenie kolumn na podstawie lokalizacji
        $titleColumn = 'title_' . $currentLocale;
        $descriptionColumn = 'description_' . $currentLocale;
        $contentColumn = 'content_' . $currentLocale;

        //  $post = Post::where('slug', $slug)->firstOrFail();
        $post = Post::select('id', $titleColumn . ' as title', $descriptionColumn . ' as description', $contentColumn . ' as content', 'slug', 'image', 'category_id', 'created_at', 'updated_at')
        ->where('slug', $slug)
        ->firstOrFail();

        $post->content = $parsedown->text($post->content);


        return view('post', ['post' => $post]);

    }
}
