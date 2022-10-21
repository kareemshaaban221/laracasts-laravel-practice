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
        $noCat = 30;
        $users = User::factory(100)->create();
        $categories = Category::factory($noCat)->create();

        foreach($users as $user) {
            foreach($categories as $category) {
                Post::factory()->create([
                    'user_id' => $user,
                    'category_id' => $category
                ]);
            }
        }
    }
}
