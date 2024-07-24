<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    public function permissions(): belongsToMany 
    {
        return $this->belongsToMany(Permission::class);
    }
    
    public function users(): belongsToMany 
    {
        return $this->belongsToMany(User::class);
    }
}
