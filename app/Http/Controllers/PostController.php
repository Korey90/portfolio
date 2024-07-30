<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Parsedown;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_pl' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_pt' => 'required|string|max:255',
            'description_pl' => 'required|string',
            'description_en' => 'required|string',
            'description_pt' => 'required|string',
            'content_pl' => 'required|string',
            'content_en' => 'required|string',
            'content_pt' => 'required|string',
            'active' => 'boolean',
            'slug' => 'string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $postData = $request->except('image');

        if ($request->hasFile('image')) {
            $postData['image'] = $request->file('image')->store('images', 'public');
        }

        Post::create($postData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $parsedown = new Parsedown();

        $locale = app()->getLocale();
        // Dynamiczne określenie kolumn na podstawie lokalizacji
        $titleColumn = 'title_' . $locale;
        $descriptionColumn = 'description_' . $locale;
        $contentColumn = 'content_' . $locale;

        //  $post = Post::where('slug', $slug)->firstOrFail();
        $post = Post::select('id', $titleColumn . ' as title', $descriptionColumn . ' as description', $contentColumn . ' as content', 'slug', 'image', 'category_id', 'created_at', 'updated_at')
        ->where('id', $post->id)
        ->firstOrFail();

        $post->content = $parsedown->text($post->content);
        
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title_pl' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_pt' => 'required|string|max:255',
            'description_pl' => 'required|string',
            'description_en' => 'required|string',
            'description_pt' => 'required|string',
            'content_pl' => 'required|string',
            'content_en' => 'required|string',
            'content_pt' => 'required|string',
            'active' => 'boolean',
            'slug' => 'string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $postData = $request->except('image');

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }
            $postData['image'] = $request->file('image')->store('images', 'public');
        }

        $post->update($postData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }
        
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
