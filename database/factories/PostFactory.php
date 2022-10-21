<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paras = $this->faker->paragraphs(3);
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'content' => '<p>' . $paras[0] . '</p>' . '<p>' . $paras[1] . '</p>' . '<p>' . $paras[2] . '</p>',
            'published_at' => now(),
            'user_id' => User::factory(),
            'category_id' => Category::factory()
        ];
    }
}
