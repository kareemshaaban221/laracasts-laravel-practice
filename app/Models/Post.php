<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $gaurded = []; // all cols that we don't want to be mass assigned (by create() method)

    protected $fillable = ['title', 'description', 'category_id', 'user_id', 'content', 'published_at'];

    // protected $with = ['category', 'author']; // solving n+1 problem instead of load() method in controller

    // public function getRouteKeyName() { // route model binding method
    //     // return 'title';
    //     // return 'id';
    // }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() { // without foreign key, laravel assumed it is author_id
        return $this->belongsTo(User::class, 'user_id'); // this is the solution
    }

    public function scopeFilter($query, array $filters) { // called as Post::filter('search')

        $query
            ->when($filters['search'] ?? false, fn($query, $search) => // if null returns false (the second op), otherwise return the first op
                $query
                    ->where('title' , 'like', '%'.$search.'%')
                    ->when($filters['category'] ?? false, fn($query, $category) =>
                        $query->whereHas('category', fn($query) =>
                            $query->where('slug', $category)
                        )
                    )
                    ->orWhere('content', 'like', '%'.$search.'%')
                    ->when($filters['category'] ?? false, fn($query, $category) => // if null returns false (the second op), otherwise return the first op
                        $query->whereHas('category', fn($query) =>
                            $query->where('slug', $category)
                        )
                    )
            );

        $query
            ->when($filters['category'] ?? false, fn($query, $category) => // if null returns false (the second op), otherwise return the first op
                $query->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
            )
        );

    }
}
