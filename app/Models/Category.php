<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controller\Models\Post;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts() {
        return $this->belongsToMany(Post::clas)->using(CategoryPost::class)->withTimeStamps();
    }
}
