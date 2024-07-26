<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_pl', 'title_en', 'title_pt', 
        'description_pl', 'description_en', 'description_pt', 
        'content_pl', 'content_en', 'content_pt', 
        'active', 'slug', 'image', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
