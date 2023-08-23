<?php

namespace Database\Factories;

use App\Enum\BlogPostSourceEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(4, true),
            'body' => fake()->sentences(20, true),
            'source' => fake()->randomElement(BlogPostSourceEnum::values()),
            'published_at' => fake()->dateTime(),
        ];
    }
}
