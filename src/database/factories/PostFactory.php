<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

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
        $title = $this->faker->sentence('5');
        return [
            "title" => $title,
            "slug" => \Illuminate\Support\Str::slug($title),
            "content" => $this->faker->text,
            "category_id" => random_int(1, Category::count()),
            "user_id" => User::find(1),
            "cover_path" => asset("storage/covers/cover.jpg"),
        ];
    }
}
