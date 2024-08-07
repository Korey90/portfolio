<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'service_id', 'locale', 'description', 'details', 'min_price', 'max_price', 'service_intervals'];


    protected $casts = [
        'service_intervals' => 'array',
    ];

    public function process(){
        return $this->hasMany(WorkProcess::class);
    }


}
