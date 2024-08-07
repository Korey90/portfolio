<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'min_price',
        'max_price',
        'image',
    ];

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
