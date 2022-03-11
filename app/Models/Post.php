<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $gaurded = [];

    protected $fillable = ['title', 'description', 'category_id', 'user_id', 'content', 'published_at'];

    public function getRouteKeyName() {
        // return 'title';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() { // without foreign key, laravel assumed it is author_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
