<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'end_point',
    ];

    // Relacja wiele-do-wielu z Technique
    public function techniques()
    {
        return $this->belongsToMany(Technique::class, 'project_technique');
    }
}
