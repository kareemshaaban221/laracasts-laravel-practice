<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $news = Category::create([
            'name' => 'News',
            'slug' => 'news'
        ]);

        $posts = Category::create([
            'name' => 'Posts',
            'slug' => 'posts'
        ]);

        Post::create([
            'title' => 'First Post',
            'user_id' => $user->id,
            'category_id' => $news->id,
            'description' => 'This is first post',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi assumenda provident mollitia quibusdam recusandae quia eveniet officiis dolorum repudiandae libero molestias cumque vitae, ducimus vero culpa sunt alias in iste!',
            'published_at' => now()
        ]);

        Post::create([
            'title' => 'Second Post',
            'user_id' => $user->id,
            'category_id' => $posts->id,
            'description' => 'This is second post',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi assumenda provident mollitia quibusdam recusandae quia eveniet officiis dolorum repudiandae libero molestias cumque vitae, ducimus vero culpa sunt alias in iste! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi assumenda provident mollitia quibusdam recusandae quia eveniet officiis dolorum repudiandae libero molestias cumque vitae, ducimus vero culpa sunt alias in iste!',
            'published_at' => now()
        ]);
    }
}
