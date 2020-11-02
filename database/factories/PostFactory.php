<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1,3),
            'title' => $this->faker->sentence,
            'description' => $this->faker->realText(rand(100,200)),
            'content' => $this->faker->realText(rand(500, 800)),
            'views' => rand(1000, 5000),
        ];
    }
}
